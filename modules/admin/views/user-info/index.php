<?php

use app\models\User;
use app\models\UserInfo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\TrenersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица Информация о пользователях';
$this->params['breadcrumbs'][] = ['label' => 'Административная часть', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_user',
                'value' => function ($model) {
                    return $model->user ? $model->user->username : 'Не указано';
                },
            ],
            'phone_number',
            'email',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if ($model->status == 1) {
                        return 'Активна';
                    } elseif ($model->status == 2) {
                        return 'На рассмотрении';
                    } else {
                        return 'Не активна';
                    }
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UserInfo $model, $key, $index, $column) {
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