<?php

use app\models\User;
use app\models\UserInfo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица Пользователи';
$this->params['breadcrumbs'][] = ['label' => 'Административная часть', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            [
                'attribute' => 'isAdmin',
                'value' => function ($model) {
                    return $model->isAdmin ? 'Администратор' : 'Пользователь';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
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