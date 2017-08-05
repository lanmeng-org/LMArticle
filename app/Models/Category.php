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

    protected $fillable = [
        'name', 'display_name', 'parent_id', 'order',
        'show_home', 'show_column', 'show_nav',
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
