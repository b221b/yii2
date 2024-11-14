<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Sorev';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Соревнования</h1>

<table>
    <tr>
        <th>Название</th>
        <th>Дата проведения</th>
        <th>Структура</th>
        <th>Вид спорта</th>
        <th>Призеры</th>
    </tr>
    <?php foreach ($sorevnovaniya as $sorevnovanie): ?>
        <tr>
            <td><?= Html::encode($sorevnovanie->name) ?></td>
            <td><?= Html::encode($sorevnovanie->data_provedeniya) ?></td>
            <td><?= $sorevnovanie->structure->name ?></td>
            <td><?= $sorevnovanie->vidSporta->name ?></td>
            <td>
                <?php
                $prizers = $sorevnovanie->sportsmenPrizers; // Получаем всех призеров
                if ($prizers) {
                    foreach ($prizers as $prizer) {
                        echo Html::encode($prizer->sportsmen->name) . '<br>'; // Выводим имя каждого призера
                    }
                } else {
                    echo '-';
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
