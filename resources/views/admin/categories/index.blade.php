@extends('layout.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список категорий новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('admin.categories.create') }}">Добавить
                категорию</a>
        </div>
    </div>
</div>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($categoriesList as $category)

            <tr>
                <td>{{$category['id']}}</td>
                <td>{{$category['name']}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2">Нет новостей</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>

@endsection
