<li class="nav-item dropdown">
    <a href="#" id="catergoryDropdown" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        @if (strpos(url()->current(), 'category'))
            {{$categories[basename(url()->current()) - 1]->categoryName}}
        @else
            Categories
        @endif
    </a>
    <div class="dropdown-menu nav-pills">
        @foreach ($categories as $category)
        <a href="/category/{{$category->id}}" class="dropdown-item">{{ $category->categoryName }}</a>
        @endforeach
    </div>
</li>