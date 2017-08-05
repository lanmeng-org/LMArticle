<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const URL_TYPE_ID = 0;
    const URL_TYPE_NAME = 1;

    public static $urlTypes = [
        self::URL_TYPE_ID   => 'ID',
        self::URL_TYPE_NAME => '标识',
    ];

    const SHOW_COLUMN_COLOR_DEFAULT = 0;
    const SHOW_COLUMN_COLOR_PRIMARY = 1;
    const SHOW_COLUMN_COLOR_SUCCESS = 2;
    const SHOW_COLUMN_COLOR_WARNING = 3;

    public static $showColumnColors = [
        self::SHOW_COLUMN_COLOR_DEFAULT => '默认',
        self::SHOW_COLUMN_COLOR_PRIMARY => '蓝色',
        self::SHOW_COLUMN_COLOR_SUCCESS => '绿色',
        self::SHOW_COLUMN_COLOR_WARNING => '红色',
    ];

    protected $fillable = [
        'name', 'display_name', 'parent_id', 'order',
        'show_home', 'show_column', 'show_nav', 'show_column_color',
    ];

    public function childCategory()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parentCategory()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
}
