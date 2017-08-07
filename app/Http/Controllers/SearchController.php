<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\SearchWordRepo;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public function index(Request $request)
    {
        $words = $request->get('words');
        $words = trim($words);
        $wordsLen = mb_strlen($words);
        if (empty($words) || $wordsLen >= 80) {
            return view('search.index');
        }

        SearchWordRepo::handleWord($words);

        $articles = Article::where('title', 'like', "%$words%")
            ->paginate(setting('article_list_number'));

        return view('search.search', [
            'articles' => $articles,
            'words' => $words,
        ]);
    }


}
