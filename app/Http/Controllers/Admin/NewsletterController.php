<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload;
use Illuminate\View\View;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    use Upload;

    public function index(Request $request): View
    {
        $newsletters = Newsletter::all();
        return view('admin.pages.newsletters.index', compact('newsletters'));
    }


    public function create(Request $request)
    {
        $model = new Newsletter();
        return view('admin.pages.newsletters.create', compact('model'));
    }

    public function show(Request $request, Newsletter $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, Newsletter $newsletter)
    {
        $model = $newsletter;
        return view('admin.pages.newsletters.edit', compact('model'));
    }

    public function update(Request $request, Newsletter $newsletter)
    {
        // dd($request->all(), $request->hasFile('image'));
        $newsletter->update($request->all());



        return redirect()->route('admin.newsletters.index');
    }

    public function destroy(Request $request, Newsletter $newsletter)
    {
        $newsletter->delete();

        return redirect()->route('admin.newsletters.index');
    }

    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $newsletter = Newsletter::create($request->all());

        if (isset($newsletter->id))
            return redirect()->route('home');
        else
            return redirect()->route('home');
    }
}
