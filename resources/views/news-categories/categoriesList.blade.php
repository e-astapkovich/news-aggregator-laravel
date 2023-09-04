<h2>Категории новостей:</h2>
<ul>
    <?php foreach ($categories as $category) : ?>
        <li>
            <a href = "<?=route('categories.show', ['id' => $category['id']])?>"><?= $category['name'] ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
