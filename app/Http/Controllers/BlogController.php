<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['getAll', 'index', 'showByCategory']);
    }

    public function like(Request $request ,$id)
    {
        $request->session()->push('liked', $id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $blogs = Blog::orderBy("id", "DESC")->get();
        for($i = 0; $i < $blogs->count(); $i++){
            if(strlen($blogs[$i]->blogText) >200){
                $blogs[$i]->blogText = substr($blogs[$i]->blogText, 0, 500)."...";
            }
        }
        return view('home', [
            'blogs' => $blogs,
        ]);
    }

    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);

        $blogs = $category->blogs;
        for ($i = 0; $i < $blogs->count(); $i++) {
            if (strlen($blogs[$i]->blogText) > 200) {
                $blogs[$i]->blogText = substr($blogs[$i]->blogText, 0, 500) . "...";
            }
        }
        return view('/home', [
            'blogs' => $blogs,
        ]);
    }

    public function index($id)
    {
        $blog = Blog::findOrFail($id);
        // //dd($blog);
        // for($i = 0; $i < $blog->comments->count(); $i++){
        //     dd($blog->comments[0]->commenterName);
        // }
        $blog->viewCount++;
        $blog->save();
        return view('blog\show', [
            'blog' => $blog,
            'comments' => $blog->comments,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy("created_at", "DESC")->get();
        return view('blog/create',[
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => ['required', 'image'],
            'blogText' => 'required',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $blog = new Blog();

        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->subtitle = $request->subtitle;
        $blog->category_id = $request->category_id;
        $blog->image = $imagePath;
        $blog->tag = $request->tag;
        $blog->blogText = $request->blogText;
        $blog->created_at = Carbon::now()->toDateTimeString();
        $blog->updated_at = Carbon::now()->toDateTimeString();

        //dd($blog->image);
        $blog->save();
        return redirect("blog/{$blog->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        $this->authorize('update',$blog);
        return view("/blog/edit", [
            'blog' => $blog,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $this->authorize('update', $blog);
        $blog->title = $request->title;
        $blog->subtitle = $request->subtitle;
        $blog->blogText = $request->input('blogText');
        $blog->save();
        return redirect("/blog/{$blog->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->forceDelete();
        return redirect("/home");
    }
}
