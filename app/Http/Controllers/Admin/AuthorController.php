<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Authur;

class AuthorController extends Controller
{

    public function index(Request $request): View
    {
        $authors = Authur::all();
        return view('admin.authors.index', compact('authors'));
    }

    public function create(Request $request)
    {
        $authors = Authur::all();
        return view('admin.authors.create', compact('authors'));
    }

    public function show(Request $request, Authur $author)
    {
        return view('admin.authors.show', compact('author'));
    }

    public function edit(Request $request, Authur $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, Authur $author)
    {
        // dd($request->validated());
        // dd($request->all());
        $author->update($request->all());

        $request->session()->flash('scheduleInterview.id', $author->id);

        return redirect()->route('admin.authors.index');
    }

    public function destroy(Request $request, About $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.authors.index');
    }


    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $author = Authur::create($request->all() + ['image' => "de"]);
        if (isset($author->id))
            return redirect()->route('admin.authors.index');
        else
            return redirect()->route('admin.authors.create');
    }
}
