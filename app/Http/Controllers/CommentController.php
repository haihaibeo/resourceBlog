<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $comment = new Comment();

        $comment->commenterName = $request->commenterName;
        $comment->commentString = $request->commentString;
        $comment->blog_id = $request->blog_id;
        $comment->save();

        $uri = "blog/{$comment->blog_id}";
        return redirect($uri);
    }

    public function index(){

    }

    public function destroy(){

    }
}
