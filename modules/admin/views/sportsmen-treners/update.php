<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SportsmenTreners $model */

$this->title = 'Обновить запись: ' . $model->sportsmen->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Спортсмены & Тренеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sportsmen-treners-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
