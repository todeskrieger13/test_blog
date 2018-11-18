@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')
                Редактирование категории
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Категории
            @endslot
        @endcomponent

        <hr>

        <form action="{{route('admin.category.update', $category)}}" class="form-horisontal" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            {{-- include form --}}

            @include('admin.categories.include.form')

        </form>
    </div>

@endsection
