<div class="user-registrations-panel panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fas fa-calendar-check"></i> Мои записи на соревнования
        </h3>
    </div>
    <div class="panel-body">
        <?php

        use yii\helpers\Html;

        if (empty($registrations)): ?>
            <div class="alert alert-info">
                Вы пока не записаны ни на одно соревнование
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Вид спорта</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registrations as $registration): ?>
                            <tr>
                                <td><?= Html::encode($registration->competition->name) ?></td>
                                <td><?= Html::encode($registration->competition->kindOfSport->name) ?></td>
                                <td><?= Yii::$app->formatter->asDate($registration->competition->event_date) ?></td>
                                <td>
                                    <?php if (strtotime($registration->competition->event_date) > time()): ?>
                                        <span class="label label-success">Предстоящее</span>
                                    <?php else: ?>
                                        <span class="label label-default">Завершено</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= Html::a(
                                        '<i class="fas fa-eye"></i>',
                                        ['competitions/view', 'id' => $registration->competition_id],
                                        ['class' => 'btn btn-xs btn-default']
                                    ) ?>

                                    <?= Html::a(
                                        '<i class="fas fa-times"></i>',
                                        ['competitions/unregister', 'id' => $registration->competition_id],
                                        [
                                            'class' => 'btn btn-xs btn-danger',
                                            'data' => [
                                                'confirm' => 'Вы действительно хотите отменить запись на это соревнование?',
                                                'method' => 'post',
                                            ]
                                        ]
                                    ) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>