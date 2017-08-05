<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'display_name', 'parent_id', 'order',
        'show_home', 'show_column', 'show_nav',
    ];

    public function childCategory()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
