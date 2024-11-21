<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sorevnovaniya */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Соревнования CRUD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
            'method' => 'post',
        ],
    ]) ?>
</p>

<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Параметр</th>
                <th>Значение</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Название</strong></td>
                <td><?= Html::encode($model->name) ?></td>
            </tr>
            <tr>
                <td><strong>Дата проведения</strong></td>
                <td><?= Html::encode($model->data_provedeniya) ?></td>
            </tr>
            <tr>
                <td><strong>Структура</strong></td>
                <td><?= Html::encode($model->structure->name) ?></td>
            </tr>
            <tr>
                <td><strong>Вид спорта</strong></td>
                <td><?= Html::encode($model->vidSporta->name) ?></td>
            </tr>
            <tr>
                <td><strong>Призеры</strong></td>
                <td>
                    <?php
                    $prizers = $model->sportsmenPrizers;
                    if ($prizers) {
                        foreach ($prizers as $prizer) {
                            echo Html::encode($prizer->sportsmen->name) . '<br>';
                        }
                    } else {
                        echo '-';
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>