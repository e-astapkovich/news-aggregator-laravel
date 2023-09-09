<?php foreach($news as $new): ?>
    <div style="border: 1px solid skyblue">
        <h2><?=$new['title']?></h2>
        <a href="<?=route('categories.show', ['id' => $new['category_id']])?>">category-<?=$new['category_id']?></a>
        <p><?=$new['description']?></p>
        <div><b><?=$new['created_at']?></b></div>
        <a href="<?=route('news.show', ['id' => $new['id']])?>">Подробнее...</a>
    </div>
<?php endforeach; ?>
