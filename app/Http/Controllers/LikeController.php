<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $user = auth()->user();
        $blog = Blog::findOrFail($id);
        return $user->likes()->toggle($blog);
    }
}
