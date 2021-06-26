<h1>News:</h1>
<?php foreach ($newsList as $id => $news): ?>
<div>
    <h3>
        <a href="<?= route("news.id", ["id" => $id]) ?>">
            <?= $news["name"] ?>
        </a>
    </h3>
    <p>
        <?= $news["description"] ?>
    </p>
    <br>
</div>
<?php endforeach ?>