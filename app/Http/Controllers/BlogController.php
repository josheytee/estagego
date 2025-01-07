<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {

        $blogPost = Blog::where('top_blog', '=', '1')->first();
        $blogPost2 = Blog::where('top_blog', '=', '0')->paginate(3);
        $blog = Blog::with('Author')->get();
        // dd( $blogPost2);
        return view('blog', compact('blogPost', 'blogPost2'));
    }
}
