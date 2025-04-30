<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UserInfo $model */

$this->title = $model->user ? $model->user->username : 'Пользователь не найден';
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
            'phone_number',
            'email',
            [
                'attribute' => 'id_user',
                'label' => 'Имя пользователя',
                'value' => function ($model) {
                    return $model->user ? $model->user->username : 'Не указано';
                },
            ],
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
        ],
    ]) ?>
</div>