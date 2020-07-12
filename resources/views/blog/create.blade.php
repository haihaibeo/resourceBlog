@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="form" method="POST" action="/blog" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="subtitle" class="col-md-4 col-form-label text-md-right">Subtitle</label>

                <div class="col-md-6">
                    <input id="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle') }}" required autocomplete="subtitle" autofocus>

                    @error('subtitle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="Category" class="col-md-4 col-form-label text-md-right">Category</label>

                <div class="col-md-6">
                    <select class="form-control" id="Category" name="category_id">
                        @foreach ($categories as $ctg)
                            <option value="{{ $ctg->id }}">{{ $ctg->categoryName }}</option>
                        @endforeach 
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="CustomFile" class="col-md-4 col-form-label text-md-right">Image</label>

                <div class="col-md-6">
                    <input type="file" id="customFile" name="image">
                    @error('image')
                        <div><strong class="text-danger">{{ $message }}</strong></div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="textArea">Blog</label>

                <div class="col-md-6">
                    <textarea class="form-control" id="textArea" placeholder="Blog content..." required rows="5" name="blogText"></textarea>

                    @error('blogText')
                        <div><strong class="text-danger">{{ $message }}</strong></div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right"></div>
                <div class=" col-md-6">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection