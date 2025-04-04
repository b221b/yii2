<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UserInfo $model */

$this->title = $model->username ? $model->username : 'Пользователь не найден';
$this->params['breadcrumbs'][] = ['label' => 'Таблица Информация о пользователях', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-info-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            [
                'attribute' => 'isAdmin',
                'value' => function ($model) {
                    return $model->isAdmin ? 'Администратор' : 'Пользователь';
                },
            ],
        ],
    ]) ?>
</div>