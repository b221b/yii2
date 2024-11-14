<?php

use app\models\Sportsmen;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\SportsmenSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Спортсмены';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportsmen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать спортсмена', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'razryad',
            [
                'attribute' => 'id_sport_club',
                'label' => 'Спортивный клуб',
                'value' => function ($model) {
                    return $model->sportClub ? $model->sportClub->name : 'Нет клуба';
                },
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Sportsmen $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
