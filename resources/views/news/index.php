<h1>Список новостей в категории</h1>
<?php

foreach ($newsList as $news):?>
<div class="news">
    <h3>
        <a href="<?= route('news.show', ['id' => $news['id']])?>">
            <?=$news['title']?>
        </a>
    </h3>
    <img src="<?=$news['img']?>">
    <br>
    <p><em>Status:<?=$news['status']?>: </em></p>
    <p>Autor: <?=$news['autor']?></p>
    <p><?=$news['description']?></p>
    <hr>
<?php endforeach; ?>
