<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Structure $model */

$this->title = 'Создать структуру';
$this->params['breadcrumbs'][] = ['label' => 'Таблица Структуры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    'types' => $types, // Передаем $types в _form.php
]) ?>


</div>
