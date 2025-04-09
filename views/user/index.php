<?php

use yii\helpers\Html;
use yii\bootstrap5\Nav;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;

// Группируем записи по пользователям
$groupedUsers = [];
if ($usersDataProvider && count($usersDataProvider->models) > 0) {
    foreach ($usersDataProvider->models as $user) {
        $userId = $user['id'];
        if (!isset($groupedUsers[$userId])) {
            $groupedUsers[$userId] = [
                'username' => $user['username'],
                'contacts' => []
            ];
        }
        if ($user['info_id']) { // Добавляем только если есть запись в user_info
            $groupedUsers[$userId]['contacts'][] = [
                'phone_number' => $user['phone_number'],
                'email' => $user['email'],
                'info_id' => $user['info_id']
            ];
        }
    }
}
?>

<?php if (!empty($groupedUsers)): ?>
    <div class="row justify-content-center">
        <?php foreach ($groupedUsers as $userId => $userData): ?>
            <div class="col-lg-8 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0"><?= Html::encode($userData['username']) ?></h5>
                        <?= Html::a('Добавить контакт', ['create', 'user_id' => $userId], [
                            'class' => 'btn btn-sm btn-light'
                        ]) ?>
                    </div>

                    <div class="card-body">
                        <?php if (empty($userData['contacts'])): ?>
                            <div class="alert alert-info mb-0">Нет контактных данных</div>
                        <?php else: ?>
                            <div class="row">
                                <?php foreach ($userData['contacts'] as $contact): ?>
                                    <div class="col-md-6 mb-3">
                                        <div class="contact-item h-100 p-3 border rounded position-relative bg-light">
                                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2"
                                                onclick="if(confirm('Удалить этот контакт?')) {
                                                    window.location.href='<?= \yii\helpers\Url::to(['delete', 'id' => $contact['info_id']]) ?>'
                                                }"></button>

                                            <div class="d-flex align-items-center mb-2">
                                                <i class="fas fa-user-circle fa-2x text-muted me-3"></i>
                                                <div>
                                                    <h6 class="mb-0">Контакт #<?= $contact['info_id'] ?></h6>
                                                </div>
                                            </div>

                                            <div class="ms-4 ps-3">
                                                <p class="card-text mb-2">
                                                    <i class="fas fa-phone text-muted me-2"></i>
                                                    <?= $contact['phone_number'] ? Html::encode($contact['phone_number']) : '<span class="text-muted">Не указан</span>' ?>
                                                </p>
                                                <p class="card-text mb-3">
                                                    <i class="fas fa-envelope text-muted me-2"></i>
                                                    <?= $contact['email'] ? Html::encode($contact['email']) : '<span class="text-muted">Не указан</span>' ?>
                                                </p>

                                                <?= Html::a(
                                                    '<i class="fas fa-edit me-1"></i> Редактировать',
                                                    ['update', 'id' => $contact['info_id']],
                                                    [
                                                        'class' => 'btn btn-sm btn-outline-primary w-100'
                                                    ]
                                                ) ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="card-footer bg-transparent">
                        <div class="main-menu__nav">
                            <?= Nav::widget([
                                'options' => ['class' => 'main-menu__list justify-content-end'],
                                'items' => [
                                    Yii::$app->user->isGuest
                                        ? ['label' => 'Войти', 'url' => ['/site/login']]
                                        : [
                                            'label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
                                            'url' => ['/site/logout'],
                                            'linkOptions' => ['data-method' => 'post']
                                        ],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-warning">
        <i class="fas fa-exclamation-circle"></i> Пользователи не найдены
    </div>
<?php endif; ?>