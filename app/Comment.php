<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id', 'user_id', 'guest_name', 'guest_email', 'parent_id', 'comment', 'commentable_id', 'commentable_type'
    ];

    public function user() {
        return $this -> belongsTo(User::class);
    }

    public function post() {
        return $this -> belongsTo(Post::class);
    }

    public function replies() {
        return $this -> hasMany(Comment::class, 'parent_id');
    }
}
