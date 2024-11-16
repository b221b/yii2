<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StructureChars $model */

$this->title = 'Обновить Характеристики Структур: ' . $model->structure->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Характеристики Структур', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="structure-chars-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
