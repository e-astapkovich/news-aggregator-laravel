@extends('layouts.admin')

@section('title') Пользователи @parent @stop

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список пользователей</h1>
    {{-- //TODO Сделать CRUD пользователей --}}
    {{-- <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('admin.users.create') }}">Добавить
                пользователя</a>
        </div>
    </div> --}}
</div>

<div class="table-responsive small">
    @include('inc.message')
    {{-- //TODO Добавить фильтр по полю Роль --}}

    {{-- <form>
        <span>Статус: </span>
        <select id="filter">
            <option>--выберите вариант--</option>
            <option>{{ \App\Enums\News\Status::DRAFT->value }}</option>
            <option>{{ \App\Enums\News\Status::ACTIVE->value }}</option>
            <option>{{ \App\Enums\News\Status::BLOCKED->value }}</option>
        </select>
    </form> --}}
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Роль</th>
                <th scope="col">Действие</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($users as $user)

            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->is_admin)
                    Администратор
                    @else
                    Пользователь
                    @endif
                </td>
                <td>
                    @if ($user->id !== Auth::user()->id)
                        <a href="{{ route('admin.users.toggleRole', $user) }}">
                            @if ($user->is_admin)
                            Забрать права администратора
                            @else
                            Назначить администратором
                            @endif
                        </a>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">Нет пользователей</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>

{{ $users->links() }}

@endsection
