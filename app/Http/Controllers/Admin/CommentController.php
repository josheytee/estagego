<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index(Request $request): View
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    public function create(Request $request)
    {
        $model = new Comment();
        return view('admin.comments.create', compact('model'));
    }

    public function show(Request $request, Comment $comment)
    {
        return view('admin.comments.create', compact('scheduleInterview'));
    }

    public function edit(Request $request, Comment $comment)
    {
        $model = $comment;
        return view('admin.comments.edit', compact('model'));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        return redirect()->route('admin.comments.index');
    }

    public function destroy(Request $request, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index');
    }


    public function acknowledge(Comment $comment)
    {
        $comment->show = !$comment->show;
        $comment->save();
        return redirect()->route('admin.comments.index');
    }

    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $comment = Comment::create($request->all());
        if (isset($comment->id))
            return redirect()->route('admin.comments.index');
        else
            return redirect()->route('admin.comments.create');
    }
}
