<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список соревнований', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="competitions-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Название</th>
                    <td><?= Html::encode($model->name) ?></td>
                </tr>
                <tr>
                    <th>Дата проведения</th>
                    <td><?= Yii::$app->formatter->asDate($model->event_date, 'php:d.m.Y') ?></td>
                </tr>
                <tr>
                    <th>Место проведения</th>
                    <td><?= Html::encode($model->structure->name) ?></td>
                </tr>
                <tr>
                    <th>Вид спорта</th>
                    <td><?= Html::encode($model->kindOfSport->name) ?></td>
                </tr>
                <tr>
                    <th>Призеры</th>
                    <td>
                        <?php if ($model->sportsmanPrizewinner): ?>
                            <ul>
                                <?php foreach ($model->sportsmanPrizewinner as $prizer): ?>
                                    <li><?= Html::encode($prizer->sportsman->name) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <span class="text-muted">Нет данных о призерах</span>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <?= Html::a('Назад к списку', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>