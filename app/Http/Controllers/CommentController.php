<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'phone' => 'required',
            'comment'=>'required|min:10',
            
        ]);

        $comment=new Comment;
        $comment->name=$request->input('name');
        $comment->email=$request->input('email');
        $comment->phone=$request->input('phone');
        $comment->website=$request->input('website');
         $comment->comment=$request->input('comment');
        
         if($comment->save()){
        $comment->save();
        return back()->with('msgSuccess','Your comment would be updated after review shortly');
       }else
       {
        return back()->with('msgError','Your comment was not submitted successful,please try again');
       }
         
    }
    
}
