<?php

use yii\helpers\Url;

$this->title = 'Административная часть';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>

    <!-- <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>

    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p> -->

    <div class="container" style="margin-top: 20px;">
    <div class="row">

        <div class="col-md-4">
            <h2>Таблицы</h2>
            <?= \yii\helpers\Html::a('Таблица Спортсмены', Url::to(['sportsmen/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            <?= \yii\helpers\Html::a('Таблица Тренеров', Url::to(['treners/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            <?= \yii\helpers\Html::a('Таблица Виды Спорта', Url::to(['vid-sporta/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            <?= \yii\helpers\Html::a('Таблица Спорт Клубы', Url::to(['sport-club/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            <?= \yii\helpers\Html::a('Таблица Организации', Url::to(['org/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
        </div>

        <div class="col-md-4">
            <h2>Второстепенные таблицы</h2>
            <?= \yii\helpers\Html::a('Таблица Призовые', Url::to(['prizer/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            <?= \yii\helpers\Html::a('Таблица Структуры', Url::to(['structure/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            <?= \yii\helpers\Html::a('Таблица Характеристики структур', Url::to(['structure-chars/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
        </div>

        <div class="col-md-4">
            <h2>Смежные таблицы</h2>
            <?= \yii\helpers\Html::a('Таблица Организации и Соревнования', Url::to(['org-sorevnovaniya/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            <?= \yii\helpers\Html::a('Таблица Спортсмены и Соревнования', Url::to(['sportsmen-sorevnovaniya/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            <?= \yii\helpers\Html::a('Таблица Спортсмены и Виды Спорта', Url::to(['sportsmen-vid-sporta/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            <?= \yii\helpers\Html::a('Таблица Спортсмены и Тренеры', Url::to(['sportsmen-treners/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
        </div>

    </div>
</div>



    <!-- <div class="btn-group-vertical" style="margin-top: 20px;">
        <?= \yii\helpers\Html::a('Таблица Спортсмены', Url::to(['sportsmen/index']), ['class' => 'btn btn-white btn-lg', 'style' => 'background-color: #FFFFFF; border-color: #FFFFFF;']) ?>
        <?= \yii\helpers\Html::a('Таблица Спорт Клубы', Url::to(['sport-club/index']), ['class' => 'btn btn-blue btn-lg', 'style' => 'background-color: #0033CC; border-color: #0033CC;']) ?>
        <?= \yii\helpers\Html::a('Таблица Тренеров', Url::to(['treners/index']), ['class' => 'btn btn-red btn-lg', 'style' => 'background-color: #FF0000; border-color: #FF0000;']) ?>
        <?= \yii\helpers\Html::a('Таблица Виды Спорта', Url::to(['vid-sporta/index']), ['class' => 'btn btn-white btn-lg', 'style' => 'background-color: #FFFFFF; border-color: #FFFFFF;']) ?>
        <?= \yii\helpers\Html::a('Таблица Спортсмены & Виды Спорта', Url::to(['sportsmen-vid-sporta/index']), ['class' => 'btn btn-blue btn-lg', 'style' => 'background-color: #0033CC; border-color: #0033CC;']) ?>
        <?= \yii\helpers\Html::a('Таблица Спортсмены & Тренеры', Url::to(['sportsmen-treners/index']), ['class' => 'btn btn-red btn-lg', 'style' => 'background-color: #FF0000; border-color: #FF0000;']) ?>
        <?= \yii\helpers\Html::a('Таблица Структуры', Url::to(['structure/index']), ['class' => 'btn btn-white btn-lg', 'style' => 'background-color: #FFFFFF; border-color: #FFFFFF;']) ?>
        <?= \yii\helpers\Html::a('Таблица Характеристики структур', Url::to(['structure-chars/index']), ['class' => 'btn btn-blue btn-lg', 'style' => 'background-color: #0033CC; border-color: #0033CC;']) ?>
        <?= \yii\helpers\Html::a('Таблица Организации', Url::to(['org/index']), ['class' => 'btn btn-red btn-lg', 'style' => 'background-color: #FF0000; border-color: #FF0000;']) ?>
        <?= \yii\helpers\Html::a('Таблица Организации и Соревнования', Url::to(['org-sorevnovaniya/index']), ['class' => 'btn btn-white btn-lg', 'style' => 'background-color: #FFFFFF; border-color: #FFFFFF;']) ?>
        <?= \yii\helpers\Html::a('Таблица Спортсмены и Соревнования', Url::to(['sportsmen-sorevnovaniya/index']), ['class' => 'btn btn-blue btn-lg', 'style' => 'background-color: #0033CC; border-color: #0033CC;']) ?>
        <?= \yii\helpers\Html::a('Таблица Призовые', Url::to(['prizer/index']), ['class' => 'btn btn-red btn-lg', 'style' => 'background-color: #FF0000; border-color: #FF0000;']) ?>
    </div> -->

</div>