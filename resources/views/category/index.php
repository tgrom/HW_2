<h1>Список категорий</h1>
<?php
foreach ($categoryList as $category):?>
<div class="category">
    <h2>
        <a href="<?= route('news')?>">
        <?=$category['title']?>
        </a>
    </h2>


    <p><em>Статус: </em><?=$category['status']?> </p>
    <p><em>Количество новостей в категории: </em> <?=$category['number']?></p>

    <hr>
    <?php endforeach; ?>
