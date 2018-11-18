@foreach($categories AS $category)

    @if($category->getChildrenCategory->where('published', 1)->count())
        <li class="dropdown">
            <a href="{{url("/blog/category/$category->slug")}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{$category->title}} <span class="caret"></span>
                <ul class="dropdown-menu" role="menu">
                    @include('layouts.top_menu', ['categories' => $category->getChildrenCategory])
                </ul>
            </a>
    @else
        <li>
            <a href="{{url("/blog/category/$category->slug")}}">{{$category->title}}</a>
    @endif
        </li>
@endforeach
