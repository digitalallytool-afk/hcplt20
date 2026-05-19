<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $fillable = ['name', 'slug', 'status', 'order'];

    public function articles()
    {
        return $this->hasMany(NewsArticle::class, 'category_id');
    }
}
