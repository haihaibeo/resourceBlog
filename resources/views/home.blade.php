@extends('layouts.app')

@section('content')
<div class="container">
    <!-- #region Slider news -->
    <div id="carouselPost" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @for ($i = 0; $i < 5; $i++)
                <li data-target="#carouselPost" data-slide-to="{{$i}}"></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            @if ($blogs->count() > 5)
                @for ($i = 0; $i < 5; $i++)
                    <a  @if ($i===0) class="carousel-item active"
                        @else class="carousel-item" 
                        @endif href="/blog/{{$blogs[$i]->id}}">

                        <div class="card bg-dark text-white">
                            <img src="storage/{{$blogs[$i]->image}}" height="400px" class="card-img w-100 object-fit-cover image-in-slider" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title">{{ $blogs[$i]->title }}</h5>
                                <p class="card-text">{{ $blogs[$i]->category->categoryName }}</p>
                                <p class="card-text">{{ $blogs[$i]->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </a>
                @endfor
            @endif
        </div>
        <a class="carousel-control-prev" style="width: 5%;" href="#carouselPost" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" style="width: 5%;" href="#carouselPost" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


        
    <!-- #endregion -->
    <br>
    <!-- #region Post news -->
    @foreach ($blogs ?? '' as $blog)
    <div class="card mx-auto w-100 my-2 mb-4" style="border-radius: 10px; border-width:1.2px;">
        <div class="row no-gutters">
            <div class="col-md-5 view overlay">
                <a href="/blog/{{ $blog->id }}" class="d-flex">
                    @if ($blog->image !== "" && $blog->image !== "image")
                    <img src="/storage/{{ $blog->image }}" class="card-img object-fit-cover" alt="Card image cap" height="300px" style="border-radius: 10px;">
                    @else
                    <img src="https://dummyimage.com/600x400/000/fff&text=Please+login+and+post+to+see+a+better+version" class="card-img" alt="Card image cap">
                    @endif
                </a>
            </div>

            <div class="col-md-7 d-flex">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"><strong>{{$blog->title}}</strong></h5>
                        <div class="card-subtitle mb-2 text-muted h-4">{{$blog->category->categoryName}}</div>
                    </div>
                    <p>by
                        <span>
                            <a href="#">{{ $blog->user->name }}</a>
                        </span>
                    </p>
                    <p class="card-text mb-0">{{$blog->blogText}}</p>
                    <a class="card-link" href="{{ "/blog/$blog->id" }}">Learn more
                        <svg class="bi bi-arrow-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z" />
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z" />
                        </svg>
                    </a>
                    
                    <div class="card-text mt-auto d-flex">
                        <div class="mr-auto d-flex">
                            <p class="mb-0 px-2">
                                <svg class="bi bi-eye mr-2" width="1.1em" height="1.1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                    <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>{{ $blog->viewCount }}
                            </p>
                            <div class="border-right"></div>
                            <p class="mb-0 px-2">
                                <svg class=" mr-2" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>{{ $blog->likesCount() }}
                            </p>
                            <div class="border-right"></div>
                            <p class="mb-0 px-2">
                                <svg class="bi bi-chat mb-1 mr-2" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                </svg>{{ $blog->comments->count() }}
                            </p>
                        </div>
                        <small class="text-muted ml-auto">Posted {{ $blog->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
    @endforeach
    <!-- #endregion -->
</div>
@endsection