<?php

use app\models\SportsmenVidSporta;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\SportsmenVidSportaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица Спортсмены & Виды Спорта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportsmen-vid-sporta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        
        [
            'attribute' => 'id_sportsmen',
            'value' => function ($model) {
                return $model->sportsmen ? $model->sportsmen->name : 'Не указано'; // Предполагаем, что у Sportsmen есть поле name
            },
        ],
        [
            'attribute' => 'id_vid_sporta',
            'value' => function ($model) {
                return $model->vidSporta ? $model->vidSporta->name : 'Не указано'; // Предполагаем, что у VidSporta есть поле name
            },
        ],
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, SportsmenVidSporta $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>



</div>
