<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SportsmenVidSporta $model */

$this->title = 'Обновить спортсмена и вид спорта: ' . $model->sportsman->name . ' & '. $model->kindOfSport->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Спортсмены & Виды Спорта', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sportsmen-vid-sporta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
