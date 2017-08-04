<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'display_name', 'order', 'parent_id',
    ];

    public function childCategory()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
