<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Authur;
use App\Models\Comment;
class BlogviewController extends Controller
{
    public function index()
    {
        return view('blog_view');
    }

     public function show($id){
        // dd($id); 
        $homeName=Page::where('pageName','=','Home')->first();
        $blogName=Page::where('pageName','=','Blog')->first();
        $singleBlog=Blog::find($id); 
        $blogBelongs=Blog::with('Author')->first();
        // comment
        $comments=Comment::where('show','=','1')->get();

        //   $time = strtotime($comments->updated_at);
        //   $commentDuration  = Date('h\hi\m\i\n',$time).' '.'ago';
                 

        // $Author=Authur::with('Blog')->get();
        // dd($blogBelongs);
        return view('blog_view', compact('singleBlog','homeName','blogName', 'blogBelongs','comments'));
    }
}

