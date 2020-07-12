<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function likes(){
        return $this->belongsToMany(Blog::class);
    }

    public function ifUserLikeBlog($blog){
        return $this->likes->contains($blog->id);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($user){
            $user->blogs()->delete();
        });
    }
}
