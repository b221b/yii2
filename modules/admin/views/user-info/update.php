<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Обновить Тренера: ' . $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Информация о пользователях', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
