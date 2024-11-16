<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Structure $model */

$this->title = 'Обновить структуру: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Структуры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="structure-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    'types' => $types, // Передаем $types в _form.php
]) ?>


</div>
