<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $category = new Category();
        $category->categoryName = request()->input('categoryName');
        $category->save();
        return redirect('/home');
    }

    public function destroy(){

    }
}
