<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as User;
use App\Comment as Comment;
use App\Category as Category;
use App\Like as Like;


class Project extends Model
{
    //
    protected $fillable = [
        'meta_title', 'meta_desc',
        'content', 'desc', 'alias',
        'img','author','userlikeids',
        'view_count','category_id','slider_photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'author');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class , 'category_id');
    }
    //likables
    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }
     public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (!is_null($like)) ? true : false;
    }


}
