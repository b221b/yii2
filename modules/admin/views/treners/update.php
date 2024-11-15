<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Treners $model */

$this->title = 'Update Treners: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Treners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="treners-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
