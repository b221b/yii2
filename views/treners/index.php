<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Запрос: Список тренеров по виду спорта';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="treners-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="search-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sport')->dropDownList($sports, ['prompt' => 'Выберите вид спорта']) ?>

        <div class="form-group">
            <?= Html::submitButton('Получить тренеров', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Получить все записи', ['index'], ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <h2>Результаты:</h2>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $dataProvider,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'trainer_name',
            [
                'attribute' => 'sport_name',
                'value' => function ($model) {
                    return $model['sport_name'] ?? 'Не указано'; // Если sport_name пустое, выводим 'Не указано'
                },
            ],
        ],
    ]); ?>


</div>