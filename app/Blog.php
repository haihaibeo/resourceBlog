<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PDO;

class Blog extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'tag'
    ];

    protected $attributes = array(
        'likeCount' => 0,
        'viewCount' => 0,
    );

    public function comments(){
        return $this->hasMany(Comment::class)->orderBy("created_at", "DESC");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likesCount(){
        return $this->likedBy->count();
    }

    public function likedBy(){
        return $this->belongsToMany(User::class);
    }

    public function ifIsLikedByUser(){
        return $this->likedBy->contains(auth()->user()->id);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($blog){
            $blog->comments()->delete();
        });
    }
}
