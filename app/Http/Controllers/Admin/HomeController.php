<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\About;
use App\Models\Home;
use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request, Home $home): View
    {
        $homes = Home::all();
        return view('admin.pages.homes.index', compact('homes'));
    }


    public function create(Request $request)
    {
        // return view('admin.contacts.create');
    }

    public function show(Request $request, About $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, Home $home)
    {
        return view('admin.pages.homes.edit', compact('home'));
    }

    public function update(Request $request, Home $home)
    {
        // dd($request->all());
        $home->update($request->all());

        // $request->session()->flash('scheduleInterview.id', $scheduleInterview->id);

        return redirect()->route('admin.homes.index');
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
