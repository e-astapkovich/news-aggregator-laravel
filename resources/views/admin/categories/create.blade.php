@extends('layout.admin')

@section('title') Create Category @parent @stop

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить категорию новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>

@include('inc.message')

<form method="post" action="{{ route('admin.categories.store') }}">

    @csrf
    <div class="form-group">
        <label for="title">Название</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
    </div>
    <br>
    <button type="submit" class="btn btn-success">Сохранить</button>

</form>

@endsection
