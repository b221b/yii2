<?php

use app\models\Trainers;
use app\models\KindOfSport;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\TrenersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица Тренеры';
$this->params['breadcrumbs'][] = ['label' => 'Административная часть', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treners-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать тренера', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'id_kind_of_sport', // Указываем атрибут
                'value' => function ($model) {
                    return $model->kindOfSport ? $model->kindOfSport->name : 'Не указано'; // Проверяем наличие связи и выводим имя
                },
                'filter' => \yii\helpers\ArrayHelper::map(KindOfSport::find()->all(), 'id', 'name'), // Добавляем фильтр для выбора вида спорта
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Trainers $model, $key, $index, $column) {
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