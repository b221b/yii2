<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Org $model */

$this->title = 'Обновить Организацию: ' . $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Организации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="org-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
