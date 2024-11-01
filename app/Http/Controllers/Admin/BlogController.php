<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\About;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Authur;

class BlogController extends Controller
{

    public function index(Request $request): View
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create(Request $request)
    {
        $authors = Authur::all();
        return view('admin.blogs.create', compact('authors'));
    }

    public function show(Request $request, Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit(Request $request, Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        // dd($request->validated());
        $blog->update($request->all());

        $request->session()->flash('scheduleInterview.id', $blog->id);

        return redirect()->route('admin.blogs.index');
    }

    public function destroy(Request $request, About $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.blogs.index');
    }


    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $blog = Blog::create($request->all());
        if (isset($blog->id))
            return redirect()->route('admin.blogs.index');
        else
            return redirect()->route('admin.blogs.create');
    }
}
