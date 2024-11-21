<?php

use app\models\OrgSorevnovaniya;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\OrgSorevnovaniyaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица Ораганизация & Соревнования';
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
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OrgSorevnovaniya $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>