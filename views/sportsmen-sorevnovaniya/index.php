<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Список спортсменов';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="sportsmen-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="search-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'start_date')->input('date') ?>
        <?= $form->field($model, 'end_date')->input('date') ?>

        <div class="form-group">
            <?= Html::submitButton('Получить спортсменов', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Получить все записи', ['index'], ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <h2>Результаты:</h2>
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $dataProvider,
            'pagination' => false,
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name', // Поле имени спортсмена
        ],
    ]); ?>
</div>