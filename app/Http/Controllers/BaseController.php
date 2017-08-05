<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;

class BaseController extends Controller
{
    public function __construct()
    {
        view()->share([
            'categories' => Category::with('childCategory')->get(),
        ]);
    }
}
