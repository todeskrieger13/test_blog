@foreach($categories AS $category)
    <option value="{{$category->id or ""}}"
            @isset($article->id)
                @foreach($article->getCategories AS $category_article)
                    @if($category->id == $category_article->id)
                        selected="selected"
                    @endif
                @endforeach
            @endisset
    >
        {!! $delimiter or "" !!}{{$category->title or ""}}
    </option>

    @if(count($category->getChildrenCategory) > 0 )
        @include('admin.articles.include.categories', array(
            'categories' => $category->getChildrenCategory,
            'delimiter' => ' - ' . $delimiter
        ))
    @endif

@endforeach
