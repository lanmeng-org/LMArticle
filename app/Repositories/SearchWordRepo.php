<?php

namespace App\Repositories;

use App\Models\SearchWord;

class SearchWordRepo extends Repository
{
    public function model()
    {
        return SearchWord::class;
    }

    public static function getList($number = null)
    {
        if (empty($number)) {
            $number = (int)setting('search_words_number');
        }

        return SearchWord::orderBy('count', 'desc')
            ->where('status', 1)
            ->take($number)
            ->get();
    }

    public static function handleWord($word)
    {
        $searchWord = SearchWord::where('word', $word)->first();
        if (empty($searchWord)) {
            SearchWord::create(['word' => $word]);
        } else {
            $searchWord->increment('count');
        }
    }
}
