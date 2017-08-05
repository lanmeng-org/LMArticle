<?php

namespace Lanmeng\Qiu5;

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
}
