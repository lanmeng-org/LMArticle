<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\Category;

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
        $data = $request->all();
        if (isset($data['position'])) {
            $data['position'] = array_sum($data['position']);
        }
        Article::create($data);

        return redirect()->route('admin.article.index');
    }

    public function edit(Article $article)
    {
        return view('admin.article.form', [
            'data'       => $article,
            'categories' => $this->getCategories(),
        ]);
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $data = $request->all();
        if (isset($data['position'])) {
            $data['position'] = array_sum($data['position']);
        }
        $article->update($data);

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
