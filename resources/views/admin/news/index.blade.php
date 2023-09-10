@extends('layout.admin')

@section('title') Новости @parent @stop

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2>Новости</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($newsList as $new)

                <tr>
                    <td>{{$new['id']}}</td>
                    <td>{{$new['title']}}</td>
                    <td>{{$new['description']}}</td>
                    <td>{{$new['category_id']}}</td>
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
</main>

@endsection
