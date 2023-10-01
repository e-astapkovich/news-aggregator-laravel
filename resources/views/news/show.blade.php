@extends('layouts.main')

@section('title') <?=$news->title?> @parent @stop
@section('content')

<div class="container">

    <div style="border: 1px solid skyblue">
        <h2><?= $news->title ?></h2>
        <a href="<?=route('categories.show', ['id' => $news->category_id])?>">category-<?=$news->category_id?></a>
        <p><?= $news->description ?></p>
        <div><b><?= $news->created_at ?></b></div>
    </div>

</div>

@endSection
