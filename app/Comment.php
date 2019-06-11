<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    //Define Polymorphic Relationships.
    //https://github.com/KrunalLathiya/LaravelCommentNesting/blob/master/app/Comment.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    
}
