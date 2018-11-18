@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')
                Список пользователей
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Пользователи
            @endslot
        @endcomponent

        <hr>

        <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"
                                                                                          aria-hidden="true"></i>Создать
            пользователя</a>
        <table class="table table-striped">
            <thead>
            <th>Имя</th>
            <th>Email</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($users AS $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-right">
                        <form action="{{route('admin.user_managment.user.destroy', $user)}}" method="post" onsubmit="if (confirm('Удалить?')){return true}else {return false}">
                            <input type="hidden" name="_method" value="DELETE">

                            {{ csrf_field() }}

                            <a href="{{route('admin.user_managment.user.edit', $user)}}"><i class="fa fa-edit"></i></a>

                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="3">
                        <h2>Данные отстутствуют</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">{{$users->links()}}</ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
