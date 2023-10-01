@extends('layouts.main')

@section('title') List of categories @parent @stop

@section('content')

<div class="container">
    <section class="text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Категории новостей</h1>
            </div>
        </div>
    </section>
    <ul>
        <?php foreach ($categories as $category) : ?>
        <li>
            <a href="<?=route('categories.show', ['id' => $category->id])?>">
                <?= $category->name ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    {{ $categories->links() }}
</div>

@endsection
