<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrgSorevnovaniya $model */

$this->title = 'Обновить запись: ' . $model->organisations->full_name . ' & ' . $model->competitions->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Ораганизация & Соревнования', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="org-sorevnovaniya-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
