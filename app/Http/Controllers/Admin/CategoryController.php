<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Traits\Upload;
use Illuminate\View\View;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Upload;

    public function index(Request $request): View
    {
        $categories = Category::all();
        return view('admin.pages.categories.index', compact('categories'));
    }


    public function create(Request $request)
    {
        $category = $request->category;
        $categories = Category::all();
        $model = new Category();
        $subCategories = SubCategory::where('category_id', $category)->get();
        return view('admin.pages.categories.create', compact('category', 'model', 'categories', 'subCategories'));
    }

    public function show(Request $request, Category $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, Category $category)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.pages.categories.edit', compact('category', 'categories', 'subCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        if (isset($category->id))
            return redirect()->route('admin.categories.index');
        else
            return redirect()->route('admin.categories.create');
    }
}
