<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Lanmeng\LMArticle\SeoUtils;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.article.index', [
            'data' => $articles,
        ]);
    }

    public function create()
    {
        return view('admin.article.form', [
            'categories' => $this->getCategories(),
        ]);
    }

    public function store(ArticleRequest $request)
    {
        Article::create($request->getParams());

        return redirect()->route('admin.article.index');
    }

    public function edit(Article $article)
    {
        $positions = [];
        foreach ([1,2,4] as $item) {
            if ($article->position & $item) {
                $positions[] = $item;
            }
        }
        $article->position = $positions;

        return view('admin.article.form', [
            'data'       => $article,
            'categories' => $this->getCategories(),
        ]);
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->getParams());

        return redirect()->route('admin.article.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return back();
    }

    protected function getCategories()
    {
        return Category::orderBy('order')
            ->pluck('display_name', 'id')
            ->toArray();
    }
}
