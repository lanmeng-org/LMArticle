<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)->with('subCategory')->get();

        return view('admin.category.index', [
            'data' => $categories,
        ]);
    }

    public function create()
    {
        $parentCategories = Category::where('parent_id', 0)->pluck('display_name', 'id')->toArray();

        return view('admin.category.form', [
            'parentCategories' => $parentCategories,
        ]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category)
    {

    }

    public function update(CategoryRequest $request)
    {

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
