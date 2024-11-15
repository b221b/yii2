<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Treners $model */

$this->title = 'Создать тренера';
$this->params['breadcrumbs'][] = ['label' => 'Treners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
