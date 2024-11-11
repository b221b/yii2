<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Sorev';
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" href="../../web/css/sorev.css">

<h1>Соревнования</h1>

<table>
    <tr>
        <th>Название</th>
        <th>Дата проведения</th>
        <th>Структура</th>
        <th>Вид спорта</th>
        <th>Призер</th>
    </tr>
    <?php foreach ($sorevnovaniya as $sorevnovanie): ?>
        <tr>
            <td><?= Html::encode($sorevnovanie->name) ?></td>
            <td><?= Html::encode($sorevnovanie->data_provedeniya) ?></td>
            <td><?= $sorevnovanie->structure->name ?></td>
            <td><?= $sorevnovanie->vidSporta->name ?></td>
            <!-- <td><?= $sorevnovanie->prizer->nagrada ?></td> -->

            <td>
                <?php
                $sportsmen = $sorevnovanie->getSportsmenSorevnovaniyas()->one();
                if ($sportsmen) {
                    echo $sportsmen->sportsmen->name;
                } else {
                    echo '-';
                }
                ?>
            </td>

        </tr>
    <?php endforeach; ?>
</table>