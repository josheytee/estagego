<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicePage;
use App\Models\Page;
use Illuminate\Support\Str;


class ServiceController extends Controller
{
     public function index(){
        $string='lorem ipsum lorem ipsum  lorem ipsum '; 
       //reverse relationship
        $pages=ServicePage::with('Page')->first();
       
        //normal relationship
        $servicesPage=Page::with('ServicePage')->get();
        // dd( $pages );
    //    dd(Str::limit('The quick brown fox jumps over the lazy dog', 20));
        return view('services',compact('pages','servicesPage'));
    }

     public function show($id)
    {  
         $product=ServicePage::find($id);
        // dd($id)
        return view('product', compact('product'));
    }
}
