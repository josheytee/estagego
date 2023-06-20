<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\ContactMessage;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact=Contact::all()->first();

        return view('contact', compact('contact'));
    }

      public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            // 'country' => 'required',
            'phone' => 'required',
            'message'=>'required|min:10',
            // 'term'=>'accepted'
           
        ]); 

        $contact=new ContactMessage;
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->company_name=$request->input('company_name');
        $contact->country=$request->input('country');
         $contact->phone=$request->input('phone');
         $contact->website=$request->input('website');
         $contact->message=$request->input('message');
         $contact->agreement=$request->input('agreement');

       if( $contact->save()){
        $contact->save();
        return back()->with('msgSuccess','Your message as been sent successful');
       }else
       {
        return back()->with('msgError','Your message was not sent successful,please try again');
       }

    }
}
