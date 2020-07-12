@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="form" method="POST" enctype="multipart/form-data" action="/category">
            @method('POST')
            @csrf
            <div class="form-group row">
                <label for="Category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Category" name="categoryName" placeholder="New Category">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>

                <div class="col-sm-10">
                    <button class="btn btn-primary" type="submit">Add new category</button>
                </div>
            </div>
        </form>
    </div>
@endsection