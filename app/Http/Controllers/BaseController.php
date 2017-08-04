<?php

namespace App\Http\Controllers;

use App\Models\Category;

class BaseController extends Controller
{
    public function __construct()
    {
        view()->share([
            'topCategories' => Category::where('parent_id', 0)->with('childCategory')->get(),
        ]);
    }
}
