<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PDO;

class Blog extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'tag'
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
