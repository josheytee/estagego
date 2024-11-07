<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index(Request $request): View
    {
        $abouts = About::all();
        return view('admin.pages.abouts.index', compact('abouts'));
    }


    public function create(Request $request)
    {
        // return view('admin.contacts.create');
    }

    public function show(Request $request, About $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, About $about)
    {
        return view('admin.pages.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        // dd($request->all());
        $about->update($request->all());

        // $request->session()->flash('scheduleInterview.id', $scheduleInterview->id);

        return redirect()->route('admin.abouts.index');
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
