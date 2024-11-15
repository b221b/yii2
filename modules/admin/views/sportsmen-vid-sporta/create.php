<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SportsmenVidSporta $model */

$this->title = 'Создать спортсмена и вид спорта';
$this->params['breadcrumbs'][] = ['label' => 'Таблица Спортсмены & Виды Спорта', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportsmen-vid-sporta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
