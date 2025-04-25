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
                        'placeholder' => 'По названию',
                        'class' => 'form-control' . (!empty($model->name) ? ' has-filter' : '')
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'event_date')->input('date', [
                        'name' => 'Competitions[event_date]',
                        'class' => 'form-control' . (!empty($model->event_date) ? ' has-filter' : '')
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'id_structure')->dropDownList(
                        \yii\helpers\ArrayHelper::map($structures, 'id', 'name'),
                        [
                            'name' => 'Competitions[id_structure]',
                            'prompt' => 'Все места',
                            'class' => 'form-control' . (!empty($model->id_structure) ? ' has-filter' : '')
                        ]
                    ) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'id_kind_of_sport')->dropDownList(
                        \yii\helpers\ArrayHelper::map($kindsOfSport, 'id', 'name'),
                        [
                            'name' => 'Competitions[id_kind_of_sport]',
                            'prompt' => 'Все виды спорта',
                            'class' => 'form-control' . (!empty($model->id_kind_of_sport) ? ' has-filter' : '')
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

    <style>
        /* .has-filter {
            border-color: #28a745 !important;
            background-color: #f8fff8 !important;
        } */
    </style>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" style="table-layout: fixed;">
            <thead class="thead-dark">
                <tr>
                    <th class="<?= in_array('name', $activeFilters) ? 'active-filter' : '' ?>">Название</th>
                    <th class="<?= in_array('event_date', $activeFilters) ? 'active-filter' : '' ?>">Дата проведения</th>
                    <th class="<?= in_array('id_structure', $activeFilters) ? 'active-filter' : '' ?>">Место проведения</th>
                    <th class="<?= in_array('id_kind_of_sport', $activeFilters) ? 'active-filter' : '' ?>">Вид спорта</th>
                    <th class="<?= in_array('prizewinners', $activeFilters) ? 'active-filter' : '' ?>">Призеры</th>
                </tr>
            </thead>

            <style>
                /* .active-filter {
                    background-color: #d4edda !important;
                    color: #155724 !important;
                    font-weight: bold;
                    position: relative;
                }

                .active-filter:after {
                    content: "✓";
                    position: absolute;
                    right: 10px;
                    top: 50%;
                    transform: translateY(-50%);
                    font-size: 14px;
                }

                #filtersCollapse .form-control:focus {
                    border-color: #28a745;
                    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
                }

                #filtersCollapse select option:checked {
                    background-color: #d4edda;
                    color: #155724;
                } */
            </style>

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