<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StructureChars $model */

$this->title = 'Создать Характеристики Структур';
$this->params['breadcrumbs'][] = ['label' => 'Таблица Характеристики Структур', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structure-chars-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
