@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">

            <div class="crop-container">
                <!-- Image -->
                @if ($blog->image === "image" || $blog->image === "")
                <img src="https://dummyimage.com/600x400/000/fff&text=Please+login+and+post+to+see+a+better+version" class="card-img-top object-fit-cover w-100" height="350px">
                @else
                <img src="/storage/{{ $blog->image }}" class="card-img-top object-fit-cover w-100" height="350px" alt="">
                @endif
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        <strong>
                            {{ $blog->title }}
                        </strong>
                    </h5>
                    <span>
                        <a href="#">{{ $blog->user->name }}</a>
                    </span>
                </div>

                <div class="card-subtitle">
                    <strong>
                        {{ $blog->subtitle }}
                    </strong>
                </div>

                <template class="card-text display-embed">
                    {!! $blog->blogText !!}
                </template>

                <div class="d-flex justify-content-between">
                    @auth
                    <like-button :blogid="{{ $blog->id }}" :ifuserlikedblog="true"> {{-- :ifuserlikedblog="{{ $blog->ifIsLikedByUser() }}" --}}
                    </like-button>
                    @endauth

                    <p class="text-muted py-2 mb-0 ml-auto">Posted {{ $blog->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>


        @auth
        @can('update', $blog)
        <div class="d-flex flex-row-reverse bd-highlight my-2">
            <a href="/blog/{{$blog->id}}/delete" class="btn btn-danger">Delete</a>
            <a href="/blog/{{$blog->id}}/edit" class="btn btn-secondary mr-2">Edit</a>
        </div>  
        @endcan
        @endauth

        <br>                
        <h4>Comment section</h4>
        <hr>

        <div class="comment-wrapper">
            <div class="panel panel-info">

                <div class="panel-body overflow-auto clearfix">
                    <div class="clearfix"></div>
                    <ul class="media-list">
                        @if ($comments->count() > 0)
                            @foreach ($comments as $comment)
                                <li class="media">
                                    <a href="#" class="float-left">
                                        <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                    </a>
                                    <div class="media-body">
                                        <span class="text-muted float-right">
                                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                        </span>
                                        <strong class="text-success">{{ $comment->commenterName }}</strong>
                                        <p>
                                            {!! $comment->commentString !!}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <div class="text-muted">
                                No one has commented on this post yet!
                            </div>
                        @endif
                        
                    </ul>
                </div>

                <hr>
                
                <h4>Leave a comment</h4>
                <div class="panel-body clearfix">
                    <form method="POST" action="/comment">
                        @csrf

                        @guest 
                        <input id="commenterName" type="text"
                                class="form-control mb-2 @error('commenterName') is-invalid @enderror" 
                                name="commenterName" value="{{ old('commenterName') }}" 
                                required autocomplete="commenterName" 
                                placeholder="Enter your name...">
                        @error('commenterName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @endguest

                        @auth
                        <input type="hidden" hidden="true" name="commenterName" value="{{ Auth::user()->name }}">
                        @endauth

                        <input type="hidden" hidden="true" name="blog_id" value="{{ $blog->id }}">
                        <textarea id="text-comment" name="commentString" class="form-control mb-2" placeholder="Write a comment..." rows="5" required></textarea>
                        <button type="submit" class="btn btn-primary float-right">Post</button>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection