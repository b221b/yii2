<?php

use app\models\SportsmanKindOfSport;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\SportsmenVidSportaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица Спортсмены & Виды Спорта';
$this->params['breadcrumbs'][] = ['label' => 'Административная часть', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportsmen-vid-sporta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_sportsman',
                'value' => function ($model) {
                    return $model->sportsman ? $model->sportsman->name : 'Не указано'; 
                },
            ],
            [
                'attribute' => 'id_kind_of_sport',
                'value' => function ($model) {
                    return $model->kindOfSport ? $model->kindOfSport->name : 'Не указано'; 
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SportsmanKindOfSport $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]);

    echo LinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'options' => [
            'class' => 'pagination justify-content-center',
        ],
        'linkOptions' => [
            'class' => 'page-link',
        ],
        'activePageCssClass' => 'active',
        'disabledPageCssClass' => 'disabled',
        'prevPageLabel' => '&laquo;',
        'nextPageLabel' => '&raquo;',
        'firstPageLabel' => 'Первая',
        'lastPageLabel' => 'Последняя',
    ]);

    ?>

</div>