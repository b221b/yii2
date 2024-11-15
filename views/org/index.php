<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Организаторы соревнований/';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="search-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_date')->input('date') ?>
    <?= $form->field($model, 'end_date')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Получить записи', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Получить все записи', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'fio',
        [
            'label' => 'Названия соревнований',
            'attribute' => 'names', // Изменено на 'names'
        ],
        [
            'label' => 'Количество соревнований',
            'attribute' => 'count',
        ],
    ],
]); ?>
