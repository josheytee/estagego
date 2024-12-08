<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload;
use App\Models\Category;
use Illuminate\View\View;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    use Upload;

    public function index(Request $request): View
    {
        $subcategories = SubCategory::all();
        // dd($subcategories);
        return view('admin.pages.subcategories.index', compact('subcategories'));
    }


    public function create(Request $request)
    {
        $subcategories = SubCategory::all();
        $model = new SubCategory();
        $categories = Category::all();
        return view('admin.pages.subcategories.create', compact('category', 'model', 'subcategories', 'categories'));
    }

    public function show(Request $request, SubCategory $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, SubCategory $subcategory)
    {
        $subcategories = SubCategory::all();
        $categories = Category::all();

        return view('admin.pages.subcategories.edit', compact('categories', 'subcategory', 'subcategories'));
    }

    public function update(Request $request, SubCategory $category)
    {
        $category->update($request->all());

        return redirect()->route('admin.subcategories.index');
    }

    public function destroy(Request $request, SubCategory $category)
    {
        $category->delete();

        return redirect()->route('admin.subcategories.index');
    }

    public function store(Request $request)
    {
        $category = SubCategory::create($request->all());

        if (isset($category->id))
            return redirect()->route('admin.subcategories.index');
        else
            return redirect()->route('admin.subcategories.create');
    }
}
