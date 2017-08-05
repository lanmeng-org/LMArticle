<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Lanmeng\Utils\StringUtil;

class Setting extends Model
{
    protected $fillable = [
        'key', 'content',
    ];

    public static $whiteList = [
        'notice_show_home', 'notice_show_number', 'category_url_type', 'article_list_number',
        'home_category_article_number', 'site_name', 'footer_content',
    ];

    public function contentArray()
    {
        return StringUtil::line2Array($this->content);
    }
}
