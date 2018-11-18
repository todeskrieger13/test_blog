@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Категорий {{$count_categories}}</span></p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Материалов {{$count_articles}}</span></p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Посетителей 0</span></p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Посетителей сегодня 0</span></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <a href="{{route('admin.category.create')}}" class="btn btn-block btn-default">Создать категорию</a>
            @foreach($categories AS $category)
            <a href="{{route('admin.category.edit', $category)}}" class="list-group-item">
                <h4 class="list-group-item-heading">{{$category->title}}</h4>
                <p class="list-group-item-text">
                    {{$category->getArticles()->count()}}
                </p>
            </a>
            @endforeach
        </div>
        <div class="col-sm-6">
            <a href="{{route('admin.article.create')}}" class="btn btn-block btn-default">Создать материал</a>
            @foreach($articles AS $article)
            <a href="{{route('admin.article.edit', $article)}}" class="list-group-item">
                <h4 class="list-group-item-heading">{{$article->title}}</h4>
                <p class="list-group-item-text">
                    {{$article->getCategories()->pluck('title')->implode(', ')}}
                </p>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
