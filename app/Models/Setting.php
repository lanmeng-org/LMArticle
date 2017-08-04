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
        'notice_show_index', 'notice_show_number',
    ];

    public function contentArray()
    {
        return StringUtil::line2Array($this->content);
    }
}
