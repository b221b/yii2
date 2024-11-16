<?php

use app\models\StructureChars;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\StructureCharsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица Характеристики Структур';
$this->params['breadcrumbs'][] = ['label' => 'Административная часть', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structure-chars-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать Характеристики Структур', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_structure',
                'value' => function ($model) {
                    return $model->structure ? $model->structure->name : 'Не указано'; // замените 'name' на нужное поле
                },
            ],
            'vmestimost',
            'tip_pokritiya',
            'kolvo_oborydovaniya',
            'kolvo_tribun',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StructureChars $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>