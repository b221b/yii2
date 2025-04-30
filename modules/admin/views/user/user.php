<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $users app\models\User[] */

$this->title = 'Статусы пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Имя пользователя</th>
            <th>Статус</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= Html::encode($user->username) ?></td>
                <td>
                    <?php if (!empty($user->userInfo)): ?>
                        <?php foreach ($user->userInfo as $info): ?>
                            <span class="<?=
                                            $info->status === 1 ? 'text-success' : ($info->status === 2 ? 'text-warning' : 'text-danger')
                                            ?>">
                                <?=
                                $info->status === 1 ? 'Активна' : ($info->status === 2 ? 'На рассмотрении' : 'Не активна')
                                ?>
                            </span><br>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <span class="text-danger">Нет данных</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($user->userInfo)): ?>
                        <?php foreach ($user->userInfo as $info): ?>
                            <div class="btn-group" role="group">
                                <?= Html::a(
                                    'Да',
                                    ['/admin/user/change-status', 'id' => $info->id, 'status' => 1],
                                    [
                                        'class' => 'btn btn-success btn-sm',
                                        'title' => 'Активировать',
                                        'data' => [
                                            'method' => 'post',
                                            'confirm' => 'Вы уверены, что хотите активировать этого пользователя?',
                                        ],
                                    ]
                                ) ?>
                                <?= Html::a(
                                    'Нет',
                                    ['/admin/user/change-status', 'id' => $info->id, 'status' => 0],
                                    [
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Деактивировать',
                                        'data' => [
                                            'method' => 'post',
                                            'confirm' => 'Вы уверены, что хотите деактивировать этого пользователя?',
                                        ],
                                    ]
                                ) ?>
                            </div>
                            <br>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>