<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getParent()
    {
        return $this->belongsTo(Category::class, 'parent', 'id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}
