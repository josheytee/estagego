<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Home;
use App\Models\Testimonials;



use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about=About::all()->first();
        $home=Home::all()->first();
        $reviews=Testimonials::all();
        return view('about',compact('about','home','reviews'));
    }
}
