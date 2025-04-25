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
                'avatar' => $user['avatar'] ?? null, // предполагаем, что есть поле avatar
                'phone' => $user['phone'] ?? null, // основной телефон пользователя
                'email' => $user['email'] ?? null, // основной email пользователя
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

<div class="profile-container">
    <?php if (!empty($groupedUsers)): ?>
        <?php foreach ($groupedUsers as $userId => $userData): ?>
            <div class="user-card">
                <div class="user-header">
                    <h2 class="user-title">Данные пользователя</h2>
                </div>

                <div class="user-profile">
                    <div class="profile-section">
                        <div class="profile-info">
                            <div class="avatar-container">
                                <?php if (!empty($userData['avatar'])): ?>
                                    <img src="<?= Html::encode($userData['avatar']) ?>" alt="Аватар" class="avatar-img">
                                <?php else: ?>
                                    <div class="avatar-placeholder">
                                        <i class="fas fa-user"></i>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="user-details">
                                <div class="detail-row">
                                    <div class="detail-label">Логин:</div>
                                    <div class="detail-value"><?= Html::encode($userData['username']) ?></div>
                                </div>

                                <!-- <?php if (!empty($userData['phone_number'])): ?>
                                    <div class="detail-row">
                                        <div class="detail-label">Телефон:</div>
                                        <div class="detail-value"><?= Html::encode($userData['phone_number']) ?></div>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($userData['email'])): ?>
                                    <div class="detail-row">
                                        <div class="detail-label">Email:</div>
                                        <div class="detail-value"><?= Html::encode($userData['email']) ?></div>
                                    </div>
                                <?php endif; ?> -->

                            </div>
                        </div>
                    </div>

                    <div class="profile-section">
                        <h3 class="profile-section-title">Контактные данные</h3>

                        <?php if (empty($userData['contacts'])): ?>
                            <div class="empty-contacts">Нет дополнительных контактных данных</div>
                        <?php else: ?>
                            <div class="contact-grid">
                                <?php foreach ($userData['contacts'] as $contact): ?>
                                    <div class="contact-card">
                                        <button type="button" class="delete-btn btn btn-sm btn-link text-danger"
                                            onclick="if(confirm('Удалить этот контакт?')) {
                                                window.location.href='<?= \yii\helpers\Url::to(['delete', 'id' => $contact['info_id']]) ?>'
                                            }">
                                            <i class="fas fa-times"></i>
                                        </button>

                                        <div class="contact-field">
                                            <div class="contact-icon">
                                                <i class="fas fa-id-card"></i>
                                            </div>
                                            <div class="contact-value">
                                                <strong>Контакт #<?= $contact['info_id'] ?></strong>
                                            </div>
                                        </div>

                                        <?php if (!empty($contact['phone_number'])): ?>
                                            <div class="contact-field">
                                                <div class="contact-icon">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                                <div class="contact-value">
                                                    <?= Html::encode($contact['phone_number']) ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($contact['email'])): ?>
                                            <div class="contact-field">
                                                <div class="contact-icon">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="contact-value">
                                                    <?= Html::encode($contact['email']) ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="action-buttons">
                                            <?= Html::a(
                                                '<i class="fas fa-edit"></i> Редактировать',
                                                ['update', 'id' => $contact['info_id']],
                                                ['class' => 'btn btn-sm btn-primary flex-grow-1']
                                            ) ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?= Html::a(
                            '<i class="fas fa-plus"></i> Добавить контакт',
                            ['create', 'user_id' => $userId],
                            ['class' => 'btn btn-primary add-contact-btn']
                        ) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-circle"></i> Пользователи не найдены
        </div>
    <?php endif; ?>

    <div class="text-end mt-3">
        <?= Nav::widget([
            'options' => ['class' => 'd-inline-flex'],
            'items' => [
                Yii::$app->user->isGuest
                    ? [
                        'label' => 'Войти',
                        'url' => ['/site/login'],
                        'linkOptions' => ['class' => 'nav-link mx-1']
                    ]
                    : [
                        'label' => '<span class="nav-link-text">Выйти (' . Yii::$app->user->identity->username . ')</span>',
                        'url' => '#',
                        'encode' => false,
                        'linkOptions' => [
                            'class' => 'nav-link mx-1',
                            'onclick' => 'event.preventDefault(); document.getElementById(\'logout-form\').submit();'
                        ]
                    ],
                '<li class="d-none">'
                    . Html::beginForm(['/site/logout'], 'post', ['id' => 'logout-form'])
                    . Html::csrfMetaTags()
                    . Html::endForm()
                    . '</li>'
            ],
        ]); ?>
    </div>
</div>