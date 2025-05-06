<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\LinkPager;

$this->title = 'Новости спортивных событий';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="sport-filter">
        <h4>Фильтр по виду спорта</h4>
        <ul>
            <li><?= Html::a('Все', ['index']) ?></li>
            <?php foreach ($sports as $sport): ?>
                <li><?= Html::a($sport->name, ['index', 'sport' => $sport->id]) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <?= \app\widgets\LastNewsWidget::widget() ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "{items}\n{pager}",
        'options' => ['class' => 'news-list'],
        'itemOptions' => ['class' => 'news-item'],
    ]); ?>
</div>