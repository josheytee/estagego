<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Faq;
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
        $featuredFaq = Faq::where('featured', '=', 'true')->get();
        $howToVideos = Faq::where('category_id', '=', 4)->get();
        $ownersFaq = Faq::where('category_id', '=', 2)->get();
        $tenantsFaq = Faq::where('category_id', '=', 1)->get();

        $contact = Contact::first();
        return view('static.support', compact('featuredFaq', 'ownersFaq', 'tenantsFaq', 'howToVideos', 'contact'));
    }

    public function privacy()
    {
        return view('static.policy');
    }
}
