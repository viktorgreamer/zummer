<?php
use yii\helpers\Url; ?>

<nav class="navbar navbar-expand-md">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-main"
            aria-controls="nav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav-main">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= Url::to('/categories'); ?>">Категории программ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to('developers'); ?>">Разработчикам</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to('/articles'); ?>">Центр знаний</a>
            </li>
        </ul>
    </div>
</nav>

