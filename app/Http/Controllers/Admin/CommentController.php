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
        return view('admin.comments.create');
    }

    public function show(Request $request, ScheduleInterview $scheduleInterview)
    {
        return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, ScheduleInterview $scheduleInterview)
    {
        return view('scheduleInterview.edit', compact('scheduleInterview'));
    }

    public function update(ScheduleInterviewUpdateRequest $request, ScheduleInterview $scheduleInterview)
    {
        $scheduleInterview->update($request->validated());

        $request->session()->flash('scheduleInterview.id', $scheduleInterview->id);

        return redirect()->route('scheduleInterview.index');
    }

    public function destroy(Request $request, ScheduleInterview $scheduleInterview)
    {
        $scheduleInterview->delete();

        return redirect()->route('scheduleInterview.index');
    }


    public function approve(Comment $comment)
    {
        $comment->approved = !$comment->approved;
        $comment->save();
        return redirect()->route('comments.index');
    }

    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $comment = Comment::create($request->all());
        if (isset($comment->id))
            return redirect()->route('comments.index');
        else
            return redirect()->route('comments.create');
    }
}
