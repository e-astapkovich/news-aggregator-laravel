@extends('layout.main')
@section('content')

<div class="container">

    <div style="border: 1px solid skyblue">
        <h2><?= $new['title'] ?></h2>
        <a href="<?=route('categories.show', ['id' => $new['category_id']])?>">category-<?=$new['category_id']?></a>
        <p><?= $new['description'] ?></p>
        <div><b><?= $new['created_at'] ?></b></div>
    </div>

</div>



@endSection
