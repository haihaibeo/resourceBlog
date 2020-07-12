<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user(){
        return $this->hasOne(User::class);
    }

    public function blog(){
        return $this->hasOne(Blog::class);
    }

    protected $table = 'blog_user';
}
