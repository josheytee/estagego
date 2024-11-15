<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload;
use Illuminate\View\View;
use App\Models\About;
use App\Models\Page;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class SubPageController extends Controller
{
    use Upload;
    public function index(Request $request): View
    {
        $subs = ServicePage::all();
        return view('admin.pages.subs.index', compact('subs'));
    }

    public function create(Request $request)
    {
        $model = new ServicePage();
        return view('admin.pages.subs.create', compact('model'));
    }

    public function show(Request $request, About $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, ServicePage $sub)
    {
        $model  = $sub;
        return view('admin.pages.subs.edit', compact('model'));
    }

    public function update(Request $request, ServicePage $sub)
    {
        // dd($request->validated());
        $sub->update($request->all());

        if ($imagePath = $this->uploadImage($request, 'subs', \Str::slug($sub->title))) {
            if ($image = $sub->images()->where('imageable_id', $sub->id)->first()) {
                $image->update([
                    'path' => $imagePath
                ]);
            } else {
                $sub->images()->create([
                    'path' => $imagePath
                ]);
            }
        }

        // $request->session()->flash('scheduleInterview.id', $scheduleInterview->id);

        return redirect()->route('admin.subs.index');
    }

    public function destroy(Request $request, About $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('site.index');
    }

    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $testimonial = About::create($request->all());
        if (isset($testimonial->id))
            return redirect()->route('contacts.index');
        else
            return redirect()->route('contacts.create');
    }
}
