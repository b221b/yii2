<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Treners $model */

$this->title = 'Обновить Тренера: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Тренеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="treners-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
