<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SportClub $model */

$this->title = 'Обновить спортивный клуб: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Спортивные Клубы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sport-club-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
