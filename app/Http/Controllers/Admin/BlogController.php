<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\About;
use App\Models\Blog;
use App\Http\Traits\Upload;
use Illuminate\Http\Request;
use App\Models\Authur;

class BlogController extends Controller
{
    use Upload;

    public function index(Request $request): View
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create(Request $request)
    {
        $model = new Blog();
        return view('admin.blogs.create', compact('model'));
    }

    public function show(Request $request, Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit(Request $request, Blog $blog)
    {
        // $model = $blog;
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        // dd($request->validated());
        $blog->update($request->all());
        if ($imagePath = $this->uploadImage($request, 'blogs', \Str::slug($blog->title) . '_' . \Str::slug($blog->id))) {
            if ($image = $blog->images()->where('imageable_id', $blog->id)->first()) {
                $image->update([
                    'path' => $imagePath
                ]);
            } else {
                $blog->images()->create([
                    'path' => $imagePath
                ]);
            }
        }
        return redirect()->route('admin.blogs.index');
    }

    public function destroy(Request $request, Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index');
    }


    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $blog = Blog::create($request->all());
        if ($imagePath = $this->uploadImage($request, 'blogs', \Str::slug($blog->title) . '_' . \Str::slug($blog->id))) {
            $blog->images()->create([
                'path' => $imagePath
            ]);
        }
        if (isset($blog->id))
            return redirect()->route('admin.blogs.index');
        else
            return redirect()->route('admin.blogs.create');
    }
}
