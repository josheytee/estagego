<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogviewController extends Controller
{
    public function index()
    {
        return view('blog_view');
    }
}

