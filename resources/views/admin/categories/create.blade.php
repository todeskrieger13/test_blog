@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')
                Список категорий
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Категории
            @endslot
        @endcomponent

        <hr>

        <form action="{{route('admin.category.store')}}" class="form-horisontal" method="post">
            {{csrf_field()}}

            {{-- include form --}}

            @include('admin.categories.include.form')

        </form>
    </div>

@endsection
