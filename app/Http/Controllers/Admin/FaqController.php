<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Traits\Upload;
use Illuminate\View\View;
use App\Models\Faq;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    use Upload;

    public function index(Request $request): View
    {
        $faqs = Faq::all();
        return view('admin.faqs.index', compact('faqs'));
    }


    public function create(Request $request)
    {
        $category = $request->category;
        $categories = Category::all();
        $subCategories = SubCategory::where('category_id', $category)->get();
        return view('admin.faqs.create', compact('category', 'categories', 'subCategories'));
    }

    public function show(Request $request, Faq $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, Faq $faq)
    {
        // $category = $request->category;
        $categories = Category::all();
        $subCategories = SubCategory::all();
        // dd($categories, $subCategories);
        if ($faq->category_id == 4) $answer  = json_decode($faq->answer, true);
        else $answer = $faq->answer;
        // dd($answer);

        return view('admin.faqs.edit', compact('faq', 'answer', 'categories', 'subCategories'));
    }

    public function update(Request $request, Faq $faq)
    {
        // dd($request->all());
        if ($request->category_id == 4) {
            $data = $request->only('category_id', 'subcategory_name', 'question');
            $faq->update($data);

            if ($imagePath = $this->uploadImage($request, 'faqs', \Str::slug($faq->id) . '_' . \Str::slug($faq->question))) {
                if ($image = $faq->images()->where('imageable_id', $faq->id)->first()) {
                    $image->update([
                        'path' => $imagePath
                    ]);
                } else {
                    $faq->images()->create([
                        'path' => $imagePath
                    ]);
                }
            }
            $answer  = ['url' => $request->url, 'image_path' => $imagePath];

            $faq->answer = json_encode($answer);
            $faq->save();
        } else {
            $faq->update($request->all());
        }

        return redirect()->route('admin.faqs.index');
    }

    public function destroy(Request $request, Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->category_id == 4) {
            $data = $request->only('category_id', 'subcategory_name', 'subcategory_id', 'question');
            $faq = Faq::create($data);

            if ($imagePath = $this->uploadImage($request, 'faqs', \Str::slug($faq->id) . '_' . \Str::slug($faq->question))) {
                $faq->images()->create([
                    'path' => $imagePath
                ]);
            }
            $answer  = ['url' => $request->url, 'image_path' => $imagePath];

            $faq->answer = json_encode($answer);
            $faq->save();

            if (isset($faq->id))
                return redirect()->route('admin.faqs.index');
            else
                return redirect()->route('admin.faqs.create');
        }
        return redirect()->route('admin.faqs.index');
    }
}
