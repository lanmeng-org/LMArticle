<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'data' => Category::paginate(10),

        ]);
    }

    public function create()
    {

    }

    public function store(CategoryRequest $request)
    {

    }

    public function update(CategoryRequest $request)
    {

    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
