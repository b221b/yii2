<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VidSporta $model */

$this->title = 'Обновить вид спорта: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Виды Спорта', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vid-sporta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
