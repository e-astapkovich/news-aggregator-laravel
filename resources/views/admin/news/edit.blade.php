@extends('layouts.admin')

@section('title') News Editing @parent @stop

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать новость</h1>
</div>

@include('inc.message')

<form method="post" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="form-group mb-4">
        <label for="title">Заголовок</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') ?? $news->title }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="author">Автор</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" value="{{ old('author') ?? $news->author }}">
        @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="description">Описание</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description') ?? $news->description }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="image">Изображение</label><br>
        <img class="mb-4" src="{{ $news->image }}" alt="Иллюстрация к новости" width="300px">
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group mb-4">
        <label for="category">Категория</label>
        <select class="form-select @error('category') is-invalid @enderror" name="category_id" id="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected($category->id == old('category_id') || $category->id === $news->category_id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="status">Статус</label>
        <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
            <option @if(old('status')==='draft' || $news->status === 'draft') selected @endif>draft</option>
            <option @if(old('status')==='active' || $news->status === 'active') selected @endif>active</option>
            <option @if(old('status')==='blocked' || $news->status === 'blocked') selected @endif>blocked</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <button type="submit" class="btn btn-success">Сохранить изменения</button>
</form>

{{-- @push('js')

<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endpush --}}

@endsection
