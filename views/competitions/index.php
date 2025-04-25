<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Список соревнований';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sorevnovaniya-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Название</th>
                    <th>Дата проведения</th>
                    <th>Место проведения</th>
                    <th>Вид спорта</th>
                    <th>Призеры</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sorevnovaniya as $sorevnovanie): ?>
                    <tr>
                        <td><?= Html::encode($sorevnovanie->name) ?></td>
                        <td><?= Yii::$app->formatter->asDate($sorevnovanie->event_date, 'php:d.m.Y') ?></td>
                        <td><?= Html::encode($sorevnovanie->structure->name) ?></td>
                        <td><?= Html::encode($sorevnovanie->kindOfSport->name) ?></td>
                        <td>
                            <?php if ($sorevnovanie->sportsmanPrizewinner): ?>
                                <ul class="list-unstyled">
                                    <?php foreach ($sorevnovanie->sportsmanPrizewinner as $prizer): ?>
                                        <li><?= Html::encode($prizer->sportsman->name) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if ($pagination->totalCount > $pagination->pageSize): ?>
        <?= LinkPager::widget([
            'pagination' => $pagination,
            'options' => ['class' => 'pagination justify-content-center'],
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
        ]) ?>
    <?php endif; ?>
</div>