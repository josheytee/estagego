<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function index(Request $request): View
    {
        $testimonials = Testimonials::all();
        return view('admin.pages.testimonials.index', compact('testimonials'));
    }


    public function create(Request $request)
    {
        // return view('admin.testimonials.create');
    }

    public function show(Request $request, Testimonials $testimonia)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, Testimonials $testimonial)
    {
        return view('admin.pages.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonials $testimonial)
    {
        // dd($request->all());
        $testimonial->update($request->all());

        // $request->session()->flash('scheduleInterview.id', $scheduleInterview->id);

        return redirect()->route('admin.testimonials.index');
    }

    public function destroy(Request $request, Testimonials $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index');
    }

    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $testimonial = About::create($request->all());
        if (isset($testimonial->id))
            return redirect()->route('testimonials.index');
        else
            return redirect()->route('testimonials.create');
    }
}