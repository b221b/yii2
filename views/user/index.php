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
                'avatar' => $user['avatar'] ?? null,
                'phone' => $user['phone'] ?? null,
                'email' => $user['email'] ?? null,
                'status' => $user['status'] ?? null,
                'info_id' => $user['info_id'] ?? null, // Добавляем info_id
                'contacts' => []
            ];
        }
        if ($user['info_id']) {
            $groupedUsers[$userId]['contacts'][] = [
                'phone_number' => $user['phone_number'],
                'email' => $user['email'],
                'info_id' => $user['info_id'],
                'status' => $user['status']
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

                                <div class="detail-row">
                                    <div class="detail-label">Статус лицензии:</div>
                                    <div class="detail-value <?= $userData['status'] === 1 ? 'text-green' : ($userData['status'] === 2 ? 'text-orange' : 'text-red') ?>">
                                        <?= Html::encode($userData['status'] === 1 ? 'Активна' : ($userData['status'] === 2 ? 'На рассмотрении' : 'Не активна')) ?>
                                    </div>

                                    <?php if ($userData['status'] === 0): ?>
                                        <?= Html::a(
                                            '<span class="btn-text">Купить лицензию</span>
        <div class="icon-container">
            <svg viewBox="0 0 24 24" class="icon card-icon">
                <path
                    d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18C2,19.11 2.89,20 4,20H20C21.11,20 22,19.11 22,18V6C22,4.89 21.11,4 20,4Z"
                    fill="currentColor"
                ></path>
            </svg>
            <svg viewBox="0 0 24 24" class="icon payment-icon">
                <path
                    d="M2,17H22V21H2V17M6.25,7H9V6H6V3H18V6H15V7H17.75L19,17H5L6.25,7M9,10H15V8H9V10M9,13H15V11H9V13Z"
                    fill="currentColor"
                ></path>
            </svg>
            <svg viewBox="0 0 24 24" class="icon dollar-icon">
                <path
                    d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"
                    fill="currentColor"
                ></path>
            </svg>
            <svg viewBox="0 0 24 24" class="icon wallet-icon default-icon">
                <path
                    d="M21,18V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V6H12C10.89,6 10,6.9 10,8V16A2,2 0 0,0 12,18M12,16H22V8H12M16,13.5A1.5,1.5 0 0,1 14.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,12A1.5,1.5 0 0,1 16,13.5Z"
                    fill="currentColor"
                ></path>
            </svg>
            <svg viewBox="0 0 24 24" class="icon check-icon">
                <path
                    d="M9,16.17L4.83,12L3.41,13.41L9,19L21,7L19.59,5.59L9,16.17Z"
                    fill="currentColor"
                ></path>
            </svg>
        </div>',
                                            ['/user/request-license', 'id' => $userData['info_id']],
                                            [
                                                'class' => 'pay-btn',
                                                'data' => [
                                                    'method' => 'post',
                                                    'confirm' => 'Вы уверены, что хотите подать заявку на лицензию?',
                                                ],
                                            ]
                                        ) ?>
                                    <?php endif; ?>
                                </div>

                                <script>
                                    function showLicenseRequest() {
                                        if (confirm("Вы уверены, что хотите подать заявку на лицензию?")) {
                                            // Здесь можно сделать AJAX-запрос на сервер для обработки заявки
                                            // Для примера просто выводим сообщение
                                            document.getElementById('license-message').innerText = "Заявка на лицензию подана.";
                                        }
                                    }
                                </script>

                                <div id="license-message" style="margin-top: 10px; color: green;"></div>

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
                                <?php
                                $contactCounter = 1; // Инициализируем счетчик контактов для пользователя
                                foreach ($userData['contacts'] as $contact): ?>
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
                                                <strong>Контакт #<?= $contactCounter ?></strong>
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
                                <?php
                                    $contactCounter++; // Увеличиваем счетчик для следующего контакта
                                endforeach; ?>
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