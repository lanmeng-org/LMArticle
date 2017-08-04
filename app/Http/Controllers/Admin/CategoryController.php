<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\CategorySortRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order')
            ->where('parent_id', 0)
            ->with('childCategory')
            ->get();

        return view('admin.category.index', [
            'data' => $categories,
        ]);
    }

    public function create()
    {
        $parentCategories = Category::orderBy('order')
            ->where('parent_id', 0)
            ->pluck('display_name', 'id')
            ->toArray();

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
        $parentCategories = Category::orderBy('order')
            ->where('parent_id', 0)
            ->where('id', '<>', $category->getKey())
            ->pluck('display_name', 'id')
            ->toArray();

        return view('admin.category.form', [
            'parentCategories' => $parentCategories,
            'data' => $category,
        ]);
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $data = $request->all();

        // 已有子分类则不能更改父分类, 限制分类只能两层
        if ($category->childCategory) {
            unset($data['parent_id']);
        }

        $category->update($request->all());

        return redirect()->route('admin.category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }

    public function sort(CategorySortRequest $request)
    {
        $orders = $request->get('order', []);

        foreach ($orders as $key => $order) {
            Category::where('id', $key)->update([
                'order' => $order,
            ]);
        }

        return back();
    }
}
