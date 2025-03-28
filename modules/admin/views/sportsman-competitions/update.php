<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SportsmenSorevnovaniya $model */

$this->title = 'Обновить запись: ' . $model->sportsman->name . ' & ' . $model->competitions->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Спортсмены & Соревнования', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sportsmen-sorevnovaniya-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
