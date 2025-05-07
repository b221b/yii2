<?php

use yii\helpers\Html;
/* @var $user \app\models\User */
?>

<table class="details-table">
    <?php if (!empty($user->userInfo)): ?>
        <?php $info = $user->userInfo[0]; // Используем первый элемент, так как userInfo - это массив отношений 
        ?>
        <tr>
            <th>Телефон:</th>
            <td><?= Html::encode($info->phone_number ?? 'Не указано') ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?= Html::encode($info->email ?? 'Не указано') ?></td>
        </tr>
        <tr>
            <th>Дата рождения:</th>
            <td>
                <?= !empty($info->birthday) ? Yii::$app->formatter->asDate($info->birthday) : 'Не указано' ?>
            </td>
        </tr>
        <tr>
            <th>Пол:</th>
            <td>
                <?= isset($info->gender) ? ($info->gender == 1 ? 'Мужской' : ($info->gender == 2 ? 'Женский' : 'Не указано')) : 'Не указано' ?>
            </td>
        </tr>

        <?php if (!empty($info->sportsClub)): ?>
            <tr>
                <th>Спортивный клуб:</th>
                <td><?= Html::encode($info->sportsClub->name) ?></td>
            </tr>
        <?php endif; ?>

        <?php if (!empty($info->trainer)): ?>
            <tr>
                <th>Тренер:</th>
                <td><?= Html::encode($info->trainer->name) ?></td>
            </tr>
        <?php endif; ?>

        <?php if (!empty($info->kindOfSport)): ?>
            <tr>
                <th>Вид спорта:</th>
                <td><?= Html::encode($info->kindOfSport->name) ?></td>
            </tr>
        <?php endif; ?>
    <?php else: ?>
        <tr>
            <td colspan="2" class="text-warning">Нет дополнительной информации</td>
        </tr>
    <?php endif; ?>
</table>