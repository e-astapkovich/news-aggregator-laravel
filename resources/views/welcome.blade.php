@extends('layouts.main')
@section('title') Welcome @parent @stop

@section('content')
<div class="container">
    <h2>Учебный проект: Агрегатор новостей</h2>
    <p>Студент: Евгений Астапкович</p>
    <p><a href="<?=route('news.index')?>">Перейти к новостям</a></p>
    <p>Geekbrains, 2023</p>
</div>
@endsection
