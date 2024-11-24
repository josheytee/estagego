<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Client;
use App\Models\Expert;
use App\Models\Home;
use App\Models\Testimonials;



use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all()->first();
        $home = Home::all()->first();
        $reviews = Testimonials::all();
        $experts = Expert::all();
        $clients = Client::all();
        $clientHomeContent = Client::where('id', '=', '1')->first();
        return view('about', compact('about', 'home', 'reviews', 'experts', 'clients', 'clientHomeContent'));
    }
}
