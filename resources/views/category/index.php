<h1>Categorys:</h1>
<?php foreach ($catList as $id => $cat): ?>
<div>
    <h3>
        <a href="<?= route("news.catid", ["catid" => $id]) ?>">
            <?= $cat ?>
        </a>
    </h3>
</div>
<?php endforeach ?>