@extends('layouts.admin')

@section('title') Категории @parent @stop

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
@include('inc.message')
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Действия</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($categoriesList as $category)

            <tr>
                <td>{{$category['id']}}</td>
                <td>{{$category['name']}}</td>
                <td>{{$category['description']}}</td>
                <td>
                    <a class="link-offset-2 link-underline link-underline-opacity-0"
                        href="{{ route('admin.categories.edit', $category) }}">
                        <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20,11.5 C20,11.2238576 20.2238576,11 20.5,11 C20.7761424,11 21,11.2238576 21,11.5 L21,18.5000057 C21,19.8807175 19.8807119,21.0000057 18.5,21.0000057 L5.48612181,21.0000057 C4.10540994,21.0000057 2.98612181,19.8807175 2.98612181,18.5000057 L2.98612181,5.5 C2.98612181,4.11928813 4.10540994,3 5.48612181,3 L12.5,3 C12.7761424,3 13,3.22385763 13,3.5 C13,3.77614237 12.7761424,4 12.5,4 L5.48612181,4 C4.65769469,4 3.98612181,4.67157288 3.98612181,5.5 L3.98612181,18.5000057 C3.98612181,19.3284328 4.65769469,20.0000057 5.48612181,20.0000057 L18.5,20.0000057 C19.3284271,20.0000057 20,19.3284328 20,18.5000057 L20,11.5 Z M18.8535534,3.14644661 L20.8535534,5.14644661 C21.0488155,5.34170876 21.0488155,5.65829124 20.8535534,5.85355339 L12.8535534,13.8535534 C12.7597852,13.9473216 12.6326082,14 12.5,14 L10.5,14 C10.2238576,14 10,13.7761424 10,13.5 L10,11.5 C10,11.3673918 10.0526784,11.2402148 10.1464466,11.1464466 L18.1464466,3.14644661 C18.3417088,2.95118446 18.6582912,2.95118446 18.8535534,3.14644661 Z M18.5,4.20710678 L11,11.7071068 L11,13 L12.2928932,13 L19.7928932,5.5 L18.5,4.20710678 Z" />
                        </svg>
                    </a>
                    <a class="link-offset-2 link-underline link-underline-opacity-0"
                        href="#">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 12V17" stroke="#000000" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M14 12V17" stroke="#000000" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M4 7H20" stroke="#000000" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000"
                                stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Нет новостей</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>

{{ $categoriesList->links() }}

@endsection
