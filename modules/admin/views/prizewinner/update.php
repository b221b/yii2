<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prizer $model */

$this->title = 'Обновить запись: ' . $model->prize_place . ' Место ';
$this->params['breadcrumbs'][] = ['label' => 'Таблица Призеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prizer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>