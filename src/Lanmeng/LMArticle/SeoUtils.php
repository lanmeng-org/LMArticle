<?php

namespace Lanmeng\LMArticle;

use App\Repositories\SettingRepo;

class SeoUtils
{
    /**
     * Seo 标题 关键词 内容
     */
    public static function getSeoArr($settingSuffix, $search = [], $replace = [])
    {
        $arr = [
            'title'       => setting('site_title_' . $settingSuffix),
            'key'         => setting('site_key_' . $settingSuffix),
            'description' => setting('site_description_' . $settingSuffix),
        ];

        $arr = array_map(function ($value) use ($search, $replace) {
            $search = array_merge($search, ['{$site.name$}']);
            $replace = array_merge($replace, [setting('site_name')]);

            return str_replace($search, $replace, $value);
        }, $arr);

        return $arr;
    }

    public static function keywordsReplace($string)
    {
        $keywords = SettingRepo::getItemContentArray('article_keywords_replace');

        if (empty($keywords)) {
            return $string;
        }

        $searchWords = [];
        $replaceWords = [];

        foreach ($keywords as $key => $keyword) {
            $replaces = explode('<==>', $keyword);
            if (count($replaces) != 2) {
                unset($keywords[$key]);
                continue;
            }

            $searchWords[] = $replaces[0];
            $replaceWords[] = $replaces[1];
        }

        return str_replace($searchWords, $replaceWords, $string);
    }
}
