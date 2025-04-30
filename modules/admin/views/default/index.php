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

        <? include 'stripe.php' ?>

        <div class="row">

            <div class="col-md-4">
                <?= \yii\helpers\Html::a('Таблица Спортсмены', Url::to(['sportsman/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Тренеров', Url::to(['trainers/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Виды Спорта', Url::to(['kind-of-sport/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Спорт Клубы', Url::to(['sports-club/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Организации', Url::to(['organisations/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Соревнования', Url::to(['../competition-c-r-u-d/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            </div>

            <div class="col-md-4">
                <?= \yii\helpers\Html::a('Таблица Призовые', Url::to(['prizewinner/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Структуры', Url::to(['structure/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Пользователи', Url::to(['user/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Информация о Пользователях', Url::to(['user-info/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <!-- <?= \yii\helpers\Html::a('Таблица Характеристики структур', Url::to(['structure-chars/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?> -->
            </div>

            <div class="col-md-4">
                <?= \yii\helpers\Html::a('Таблица Организации и Соревнования', Url::to(['organisations-competitions/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Спортсмены и Соревнования', Url::to(['sportsman-competitions/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Спортсмены и Виды Спорта', Url::to(['sportsman-kind-of-sport/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
                <?= \yii\helpers\Html::a('Таблица Спортсмены и Тренеры', Url::to(['sportsman-trainers/index']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
            </div>

        </div>

        <? include 'stripe.php' ?>

        <div align="center">
            <?= \yii\helpers\Html::a('Обработка заявок', Url::to(['user/status']), ['class' => 'btn btn-primary btn-block mb-3']) ?>
        </div>

    </div>

</div>