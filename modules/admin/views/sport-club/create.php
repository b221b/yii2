<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SportClub $model */

$this->title = 'Создать спортивный клуб';
$this->params['breadcrumbs'][] = ['label' => 'Таблица Спортивные Клубы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sport-club-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
