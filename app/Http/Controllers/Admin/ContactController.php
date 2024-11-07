<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(Request $request): View
    {
        $contacts = Contact::all();
        return view('admin.pages.contacts.index', compact('contacts'));
    }


    public function create(Request $request)
    {
        // return view('admin.contacts.create');
    }

    public function show(Request $request, Contact $contact)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, Contact $contact)
    {
        return view('admin.pages.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        // dd($request->all());
        $contact->update($request->all());

        // $request->session()->flash('scheduleInterview.id', $scheduleInterview->id);

        return redirect()->route('admin.contacts.index');
    }

    public function destroy(Request $request, Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index');
    }

    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $testimonial = About::create($request->all());
        if (isset($testimonial->id))
            return redirect()->route('contacts.index');
        else
            return redirect()->route('contacts.create');
    }
}
