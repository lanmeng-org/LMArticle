<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Requests\WebApi\ArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function store(ArticleRequest $request)
    {
        Article::create($request->getParams());

        return $this->apiResponse->success200();
    }
}
