@extends('layout.admin')

@section('title') Новости @parent @stop

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('admin.news.create') }}">Добавить
                новость</a>
        </div>
    </div>
</div>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Действия</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($newsList as $new)

            <tr>
                <td>{{$new->id}}</td>
                <td>{{$new->title}}</td>
                <td>{{$new->description}}</td>
                <td>{{$new->author}}</td>
                <td>{{$new->category_id}}</td>
                <td><a href="#">Ред.</a> | <a href="#">Уд.</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Нет новостей</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>

@endsection
