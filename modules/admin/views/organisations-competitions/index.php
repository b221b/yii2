<?php

use app\models\OrganisationsCompetitions;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\OrgSorevnovaniyaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица Организация & Соревнования';
$this->params['breadcrumbs'][] = ['label' => 'Административная часть', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-sorevnovaniya-index">

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
                'attribute' => 'id_organisations',
                'value' => function ($model) {
                    return $model->organisations ? $model->organisations->full_name : 'Не указано';
                },
            ],
            [
                'attribute' => 'id_competitions',
                'value' => function ($model) {
                    return $model->competitions ? $model->competitions->name : 'Не указано';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OrganisationsCompetitions $model, $key, $index, $column) {
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