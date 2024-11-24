<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Home;
use App\Models\Testimonials;



use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function terms()
    {
        return view('static.terms');
    }

    public function about()
    {
        $about = About::all()->first();

        return view('static.about', compact('about'));
    }

    public function support()
    {
        return view('static.support');
    }

    public function privacy()
    {
        return view('static.policy');
    }
}
