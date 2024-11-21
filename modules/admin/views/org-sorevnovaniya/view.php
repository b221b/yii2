<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\OrgSorevnovaniya $model */

$this->title = $model->org->fio . ' & ' . $model->sorevnovaniya->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Ораганизация & Соревнования', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="org-sorevnovaniya-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id_org',
                'value' => function ($model) {
                    return $model->org ? $model->org->fio : 'Не указано';
                },
            ],
            [
                'attribute' => 'id_sorevnovaniya',
                'value' => function ($model) {
                    return $model->sorevnovaniya ? $model->sorevnovaniya->name : 'Не указано';
                },
            ]
        ],
    ]) ?>

</div>