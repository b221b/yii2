<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Список соревнований';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sorevnovaniya-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Кнопка фильтрации и форма фильтров -->
    <div class="row mb-3">
        <div class="col-md-12 text-right">
            <button class="btn btn-primary" type="button" onclick="toggleFilters()">
                <i class="fas fa-filter"></i> Фильтры
            </button>
        </div>
    </div>

    <div class="collapse" id="filtersCollapse" style="display: none;">
        <div class="card card-body mb-3">
            <?php $form = \yii\widgets\ActiveForm::begin([
                'method' => 'get',
                'action' => ['index'],
            ]); ?>

            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'name')->textInput([
                        'name' => 'Competitions[name]',
                        'placeholder' => 'По названию'
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'event_date')->input('date', [
                        'name' => 'Competitions[event_date]'
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'id_structure')->dropDownList(
                        \yii\helpers\ArrayHelper::map($structures, 'id', 'name'),
                        [
                            'name' => 'Competitions[id_structure]',
                            'prompt' => 'Все места'
                        ]
                    ) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'id_kind_of_sport')->dropDownList(
                        \yii\helpers\ArrayHelper::map($kindsOfSport, 'id', 'name'),
                        [
                            'name' => 'Competitions[id_kind_of_sport]',
                            'prompt' => 'Все виды спорта'
                        ]
                    ) ?>
                </div>
            </div>

            <div class="form-group text-right">
                <?= Html::submitButton('Применить', ['class' => 'btn btn-success']) ?>
                <?= Html::a('Сбросить', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
            </div>

            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>
    </div>

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
                    <tr style="cursor: pointer;" onclick="window.location.href='<?= \yii\helpers\Url::to(['view', 'id' => $sorevnovanie->id]) ?>'">
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