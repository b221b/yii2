<div class="sport-widget">
    <div class="sport-widget-header">
        <h3 class="sport-widget-title">
            <i class="fas fa-calendar-check"></i>Текущие записи
        </h3>
    </div>
    <div class="sport-widget-body">
        <?php

        use yii\helpers\Html;

        if (empty($registrations)): ?>
            <div class="text-muted text-center">
                Нет активных записей на соревнования
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="sport-table">
                    <thead>
                        <tr>
                            <th>Соревнование</th>
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
                                        <span class="sport-badge badge-upcoming">Предстоящее</span>
                                    <?php else: ?>
                                        <span class="sport-badge badge-completed" style="background-color: #ffebee; color: #d32f2f;">Завершено</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div style="display: flex; gap: 5px;">
                                        <?= Html::a(
                                            '<i class="fas fa-eye"></i>',
                                            ['competitions/view', 'id' => $registration->competition_id],
                                            ['class' => 'sport-btn btn-view', 'title' => 'Просмотр']
                                        ) ?>

                                        <?php if (strtotime($registration->competition->event_date) > time()): ?>
                                            <?= Html::a(
                                                '<i class="fas fa-times"></i>',
                                                ['competitions/unregister', 'id' => $registration->competition_id],
                                                [
                                                    'class' => 'sport-btn btn-cancel',
                                                    'title' => 'Отменить запись',
                                                    'data' => [
                                                        'confirm' => 'Вы действительно хотите отменить запись на это соревнование?',
                                                        'method' => 'post',
                                                    ]
                                                ]
                                            ) ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>