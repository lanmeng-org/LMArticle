<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Lanmeng\Qiu5\SeoUtils;

class HomeController extends BaseController
{
    public function index()
    {
        $categoryArticles = Category::where('show_home', 1)->orderBy('order')->get();

        $data = ['categoryArticles' => $categoryArticles];
        $data += SeoUtils::getSeoArr('home');

        return view('home.index', $data);
    }
}
