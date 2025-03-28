<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Org $model */

$this->title = 'Создать организацию';
$this->params['breadcrumbs'][] = ['label' => 'Таблица Организации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
