@extends('layout.admin')

@section('title') Create Category @parent @stop

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить категорию новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>

<form method="post" action="{{ route('admin.categories.store') }}">

    @csrf
    <div class="form-group">
        <label for="title">Название категории</label>
        <input type="text" class="form-control" name="name" id="title" value="">
    </div>
    <br>
    <button type="submit" class="btn btn-success">Save</button>

</form>

@endsection
