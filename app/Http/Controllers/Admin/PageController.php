<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\About;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(Request $request): View
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function subs(Request $request): View
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create(Request $request)
    {
        // return view('admin.contacts.create');
    }

    public function show(Request $request,  $page)
    {
        return redirect('admin.homes.index');
    }

    public function edit(Request $request, $page)
    {
        // dd($page);
        $templates = ['Home' => 'home'];

        return view('admin.pages.' . $templates[$page] . '.edit', compact('page'));

        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, About $site)
    {
        // dd($request->validated());
        $site->update($request->all());

        // $request->session()->flash('scheduleInterview.id', $scheduleInterview->id);

        return redirect()->route('site.index');
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
