<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Список спортсменов';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1>Sportsmen</h1>
<ul>
    <?php
    foreach ($sportsmen as $sportsman): ?>
        <li>
            <?= Html::encode("{$sportsman->name} ({$sportsman->razryad})") ?>:
        </li>
    <?php endforeach; ?>
</ul>