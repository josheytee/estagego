<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Client;
use App\Models\Feature;
use App\Models\Testimonials;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Faq;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home=Home::all()->first();
        $home2=Home::where('id','=','2')->first();
        $homePros=Home::wherebetween('id',[3,5])->get();
        $clients=Client::all();
        $clientHomeContent=Client::where('id','=','1')->first();
        // first and second 4 datas of features
        $leftFeatures=Feature::wherebetween('id',[1,4])->get();
        $rightFeatures=Feature::wherebetween('id',[5,8])->get();
        $reviews=Testimonials::all();
        $featuredFaq=Faq::where('featured','=','true')->get();
        // testing relationship
    //    $r=SubCategory::with(['Faq'])->get();
    //    $c= Category::with(['SubCategory'])->get();

    //    $x= Page::with(['Categories'])->get();

        // dd( $x);
        return view('index', compact('home','home2','homePros','clients','clientHomeContent','leftFeatures','rightFeatures','reviews','featuredFaq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
