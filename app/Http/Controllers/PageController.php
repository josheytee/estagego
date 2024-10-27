<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Home;
use App\Models\Testimonials;



use Illuminate\Http\Request;

class PageController extends Controller
{
    public function termsofuse()
    {

        return view('terms');
    }

    public function privacypolicy()
    {

        return view('policy');
    }
}
