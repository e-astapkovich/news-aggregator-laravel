@extends('layouts.admin')

@section('title') Create New @parent @stop

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
</div>

{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <x-alert :message="$error" type='danger'></x-alert>
    @endforeach
@endif --}}

@include('inc.message')

<form method="post" action="{{ route('admin.news.store') }}">

    @csrf
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" value="{{ old('author') }}">
        @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" name="description @error('description') is-invalid @enderror" id="description">{{ old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="category">Автор</label>
        <select class="form-select @error('category') is-invalid @enderror" name="category_id" id="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected($category->id == old('category_id'))>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
            <option @if(old('status')==='draft' ) selected @endif>draft</option>
            <option @if(old('status')==='active' ) selected @endif>active</option>
            <option @if(old('status')==='blocked' ) selected @endif>blocked</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <button type="submit" class="btn btn-success">Добавить новость</button>
</form>

@push('js')

<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endpush

@endsection
