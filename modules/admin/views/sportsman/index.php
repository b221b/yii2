<?php

use app\models\Sportsman;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\SportsmenSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Спортсмены';
$this->params['breadcrumbs'][] = ['label' => 'Административная часть', 'url' => ['/admin']];
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
            'discharge',
            [
                'attribute' => 'id_sports_club',
                'label' => 'Спортивный клуб',
                'value' => function ($model) {
                    return $model->sportsClub ? $model->sportsClub->name : 'Нет клуба';
                },
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Sportsman $model, $key, $index, $column) {
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