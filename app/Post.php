<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id', 'title', 'excerpt', 'detail', 'tags', 'slug', 'is_active'
    ];

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable') -> whereNull('parent_id');
    }
}
