<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload;
use Illuminate\View\View;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    use Upload;

    public function index(Request $request): View
    {
        $messages = ContactMessage::all();
        return view('admin.pages.messages.index', compact('messages'));
    }


    public function create(Request $request)
    {
        // $model = new ContactMessage();
        // return view('admin.pages.messages.create', compact('model'));
    }

    public function show(Request $request, ContactMessage $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, ContactMessage $message)
    {
        $model = $message;
        return view('admin.pages.messages.edit', compact('model'));
    }

    public function update(Request $request, ContactMessage $message)
    {
        $message->update($request->all());
        return redirect()->route('admin.messages.index');
    }

    public function destroy(Request $request, ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index');
    }

    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $message = ContactMessage::create($request->all());

        if (isset($message->id))
            return redirect()->route('admin.messages.index');
        else
            return redirect()->route('admin.messages.create');
    }
}
