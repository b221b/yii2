<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Соревнования по спортивным сооружениям';
$this->params['breadcrumbs'][] = $this->title;
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
        [
            'label' => 'Спортивное сооружение',
            'attribute' => 'structure_name',
        ],
        [
            'label' => 'Название соревнования',
            'attribute' => 'sorevnovanie_name',
        ],
        [
            'label' => 'Дата проведения',
            'attribute' => 'data_provedeniya',
        ],
    ],
]); ?>
