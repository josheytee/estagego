<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Faq;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         $subcategoryName='GETTING STARTED';
          //  $categories=Category::with(['SubCategory'])->get();
        $categories=Category::with(['SubCategory'])->where('id','=',$id)->get();
         $ty=$id;
    //    $subCategories=SubCategory::with(['Faq'])->where('category_id','=',$ty)->where('subcategory_name','=','GETTING STARTED ')->get(); 
        //  dd( $id);
        // $subCategories=SubCategory::with(['Faq'])->where('id','=',$id)->get();
            // $subCategories=DB::select("select s.* from sub_categories s join faqs f on s.category_id=f.category_id where s.category_id=$id and s.subcategory_name='GETTING STARTED'");
            
        
        // dd($ty);
           

        $faqs=Faq::where('subcategory_name','=','GETTING STARTED')->where('category_id','=',$id);

        return view('owner', compact('categories','faqs','ty'));
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
