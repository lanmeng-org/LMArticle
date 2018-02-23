<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Lanmeng\LMArticle\SeoUtils;

class NoticeController extends BaseController
{
    public function index()
    {
        $data = [
            'notices' => Notice::orderBy('created_at', 'desc')
                ->paginate(setting('article_list_number')),
        ]
        + SeoUtils::getSeoArr('notice_list');

        return view('notice.index', $data);
    }

    public function show(Notice $notice)
    {
        $data = [
            'notice'  => $notice,
        ];
        $data += SeoUtils::getSeoArr(
            'notice',
            ['{$notice.title$}'],
            [$notice->title]
        );

        return view('notice.show', $data);
    }
}
