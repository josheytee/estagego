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
        $data  = $request->all();

        $data['h1'] = htmlentities($data['h1']);
        $data['h2_orange'] = htmlentities($data['h2_orange']);
        $data['h2'] = htmlentities($data['h2']);
        $data['caption'] = htmlentities($data['caption']);
        $data['caption2'] = htmlentities($data['caption2']);

        $home->update($data);

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
        $data  = $request->only(['title1', 'content1', 'title2', 'content2']);
        $data['title1'] = htmlentities($data['title1']);
        $data['content1'] = htmlentities($data['content1']);
        $data['title2'] = htmlentities($data['title2']);
        $data['content2'] = htmlentities($data['content2']);

        $about = About::create($request->all());

        if (isset($about->id))
            return redirect()->route('admin.abouts.index');
        else
            return redirect()->route('admin.abouts.create');
        $testimonial = About::create($request->all());
        if (isset($testimonial->id))
            return redirect()->route('contacts.index');
        else
            return redirect()->route('contacts.create');
    }
}
