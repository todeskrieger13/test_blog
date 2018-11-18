@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')
                Создание новости
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Новости
            @endslot
        @endcomponent

        <hr>

        <form action="{{route('admin.article.store')}}" class="form-horisontal" method="post">
            {{csrf_field()}}

            {{-- include form --}}

            @include('admin.articles.include.form')

            <input type="hidden" name="created_by" value="{{Auth::id()}}">

        </form>
    </div>

@endsection
