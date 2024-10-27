<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\About;
use App\Models\Page;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class SubPageController extends Controller
{

    public function index(Request $request): View
    {
        $subs = ServicePage::all();
        return view('admin.pages.subs.index', compact('subs'));
    }

    public function create(Request $request)
    {
        // return view('admin.contacts.create');
    }

    public function show(Request $request, About $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, ServicePage $sub)
    {
        $page  = $sub;
        return view('admin.pages.subs.edit', compact('page'));
    }

    public function update(Request $request, ServicePage $sub)
    {
        // dd($request->validated());
        $sub->update($request->all());

        // $request->session()->flash('scheduleInterview.id', $scheduleInterview->id);

        return redirect()->route('subs.index');
    }

    public function destroy(Request $request, About $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('site.index');
    }
    public function acknowledge(About $about)
    {
        // dd($about);
        $about->acknowledged = !$about->acknowledged;
        $about->save();
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
