<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index(Request $request): View
    {
        $faqs = Faq::all();
        return view('admin.faqs.index', compact('faqs'));
    }


    public function create(Request $request)
    {
        // return view('admin.contacts.create');
    }

    public function show(Request $request, Faq $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        // dd($request->all());
        $faq->update($request->all());

        // $request->session()->flash('scheduleInterview.id', $scheduleInterview->id);

        return redirect()->route('admin.faqs.index');
    }

    public function destroy(Request $request, Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index');
    }

    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $faq = Faq::create($request->all());
        if (isset($faq->id))
            return redirect()->route('contacts.index');
        else
            return redirect()->route('contacts.create');
    }
}
