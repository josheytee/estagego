<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{

    public function index(Request $request): View
    {
        $experts = Expert::all();
        // dd($experts[0]->images);
        return view('admin.pages.experts.index', compact('experts'));
    }


    public function create(Request $request)
    {
        $model = new Expert();
        return view('admin.pages.experts.create', compact('model'));
    }

    public function show(Request $request, Expert $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, Expert $expert)
    {
        $model = $expert;
        return view('admin.pages.experts.edit', compact('model'));
    }

    public function update(Request $request, Expert $expert)
    {
        // dd($request->all(), $request->hasFile('image'));
        $expert->update($request->all());

        $imagePath = "";
        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            if ($profileImage->isValid()) {
                $ext = $profileImage->getClientOriginalExtension();
                $pictureName = \Str::slug($expert->title) . '_' . \Str::slug($expert->name);
                $pictureNameToSave = $pictureName . '.' . $ext;
                $imagePath .= $profileImage->storeAs('', $pictureNameToSave, 'experts');

                $image = $expert->images()->where('imageable_id', $expert->id)->first();

                if ($image) {
                    $image->update([
                        'path' => $imagePath
                    ]);
                } else {
                    $expert->images()->create([
                        'path' => $imagePath
                    ]);
                }
            }
        }
        return redirect()->route('admin.experts.index');
    }

    public function destroy(Request $request, Expert $expert)
    {
        $expert->delete();

        return redirect()->route('admin.experts.index');
    }

    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $expert = Expert::create($request->all());

        $imagePath = "";
        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            if ($profileImage->isValid()) {
                $ext = $profileImage->getClientOriginalExtension();
                $pictureName = \Str::slug($expert->title) . '_' . \Str::slug($expert->name);
                $pictureNameToSave = $pictureName . '.' . $ext;
                $imagePath .= $profileImage->storeAs('', $pictureNameToSave, 'experts');

                $expert->images()->create([
                    'path' => $imagePath
                ]);
            }
        }
        if (isset($expert->id))
            return redirect()->route('admin.experts.index');
        else
            return redirect()->route('admin.experts.create');
    }
}
