<?php

namespace App\Http\Controllers\WebApi;


use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return $this->apiResponse->success200(Category::pluck('name', 'id'));
    }
}
