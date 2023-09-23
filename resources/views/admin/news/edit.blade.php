@extends('layout.admin')

@section('title') News Editing @parent @stop

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать новость</h1>
</div>

@include('inc.message')

<form method="post" action="{{ route('admin.news.update', $news) }}">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $news->title }}">
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control" name="author" id="author" value="{{ old('author') ?? $news->author }}">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" name="description" id="description">{{ old('description') ?? $news->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="category">Автор</label>
        <select class="form-select" name="category_id" id="category">

            @foreach ($categories as $category)

                <option value="{{ $category->id }}" @selected($category->id == old('category_id', $news->category_id))>
                    {{ $category->name }}
                </option>

            @endforeach

        </select>
    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-select" name="status" id="status">
            <option @if(old('status')==='draft' ) selected @endif>draft</option>
            <option @if(old('status')==='active' ) selected @endif>active</option>
            <option @if(old('status')==='blocked' ) selected @endif>blocked</option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Сохранить изменения</button>
</form>

@endsection
