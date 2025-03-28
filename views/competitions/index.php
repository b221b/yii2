<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Список соревнований';
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
            <td><?= Html::encode($sorevnovanie->event_date) ?></td>
            <td><?= $sorevnovanie->structure->name ?></td>
            <td><?= $sorevnovanie->kindOfSport->name ?></td>
            <td>
                <?php
                $prizers = $sorevnovanie->sportsmanPrizewinner;
                if ($prizers) {
                    foreach ($prizers as $prizer) {
                        echo Html::encode($prizer->sportsman->name) . '<br>';
                    }
                } else {
                    echo '-';
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
