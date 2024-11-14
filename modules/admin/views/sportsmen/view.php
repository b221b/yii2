<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Sportsmen $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Спортсмены', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sportsmen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'razryad',
            [
                'attribute' => 'id_sport_club',
                'label' => 'Спортивный клуб',
                'value' => function ($model) {
                    return $model->sportClub ? $model->sportClub->name : 'Нет клуба';
                },
            ],
        ],
    ]) ?>

</div>
