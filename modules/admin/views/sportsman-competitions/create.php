<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SportsmenSorevnovaniya $model */

$this->title = 'Создать запись';
$this->params['breadcrumbs'][] = ['label' => 'Таблица Спортсмены & Соревнования', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportsmen-sorevnovaniya-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
