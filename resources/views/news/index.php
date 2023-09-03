<?php foreach($news as $new): ?>
    <div style="border: 1px solid skyblue">
        <h2><?=$new['title']?></h2>
        <span>category-<?=$new['category_id']?></span>
        <p><?=$new['description']?></p>
        <div><b><?=$new['created_at']?></b></div>
        <a href="<?=route('news.show', ['id' => $new['id']])?>">Подробнее...</a>
    </div>
<?php endforeach; ?>
