<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sorevnovaniya */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Соревнования', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
            'method' => 'post',
        ],
    ]) ?>
</p>

<div>
    <strong>ID:</strong> <?= Html::encode($model->id) ?><br>
    <strong>Название:</strong> <?= Html::encode($model->name) ?><br>
    <strong>Дата проведения:</strong> <?= Html::encode($model->data_provedeniya) ?><br>
    <strong>Структура:</strong> <?= Html::encode($model->structure->name) ?><br>
    <strong>Вид спорта:</strong> <?= Html::encode($model->vidSporta->name) ?><br>
    <strong>Призер:</strong> <?= Html::encode($model->prizer->name ?? '-') ?><br>
</div>