@extends('layouts.main')

@section('title')News List @parent @stop

@section('content')
<div class="album bg-body-tertiary">
  <div class="container">

    <section class="text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Новости</h1>
        </div>
      </div>
    </section>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      @forelse ($newsList as $news)

      <div class="col">
        <div class="card shadow-sm card-limited">
          <img class="card-img-top card-img-limited" width="100%" height="225" src="{{ $news->image }}" alt="иллюстрация к новости">
          <div class="card-body">
            <p class="card-text fw-bold card-text-limited">{{ $news->title }}</p>
            <p class="card-text card-text-limited">{{ $news->description }}</p>
            <a href="{{  route('news.show', $news) }}">Подробнее...</a>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{ route('categories.show', ['id' => $news->category_id]) }}">
                  {{ $news->category->name }}
                </a>
              </div>
              <small class="text-body-secondary">{{ $news->created_at }}</small>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col">
        <h2>Нет новостей</h2>
      </div>
      @endforelse

    </div>
    <br>
    {{ $newsList->links() }}
  </div>
</div>


@endsection
