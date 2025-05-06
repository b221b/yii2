<?php

use yii\helpers\Html;
use yii\bootstrap5\Nav;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;

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
                'info_id' => $user['info_id'] ?? null,
                'birthday' => $user['birthday'] ?? null,
                'gender' => $user['gender'] ?? null,
                'id_sports_club' => $user['id_sports_club'] ?? null,
                'club_name' => $user['club_name'] ?? null,
                'id_trainers' => $user['id_trainers'] ?? null,
                'trainer_name' => $user['trainer_name'] ?? null,
                'id_kind_of_sport' => $user['id_kind_of_sport'] ?? null,
                'sport_name' => $user['sport_name'] ?? null,
                'contacts' => []
            ];
        }
        if ($user['info_id']) {
            $groupedUsers[$userId]['contacts'][] = [
                'phone_number' => $user['phone_number'],
                'email' => $user['email'],
                'birthday' => $user['birthday'] ?? null,
                'gender' => $user['gender'] ?? null,
                'id_sports_club' => $user['id_sports_club'] ?? null,
                'club_name' => $user['club_name'] ?? null,
                'id_trainers' => $user['id_trainers'] ?? null,
                'trainer_name' => $user['trainer_name'] ?? null,
                'id_kind_of_sport' => $user['id_kind_of_sport'] ?? null,
                'sport_name' => $user['sport_name'] ?? null,
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
                    <h2 class="user-title">Личный кабинет</h2>
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
                                            ['/user/request-license', 'id' => $userData['contacts'][0]['info_id']],
                                            [
                                                'class' => 'pay-btn',
                                                'data' => [
                                                    'method' => 'post',
                                                    'confirm' => 'Вы уверены, что хотите подать заявку на лицензию? Убедитесь, что все обязательные поля заполнены.',
                                                ],
                                                'onclick' => 'return confirm("Вы уверены, что хотите подать заявку на лицензию? Убедитесь, что все обязательные поля заполнены.");'
                                            ]
                                        ) ?>
                                    <?php endif; ?>

                                    <?php
                                    $js = <<<JS
                                        // Подтверждение перед отправкой заявки
                                        $(document).on('click', '.pay-btn', function(e) {
                                            if (!confirm('Вы уверены, что хотите подать заявку на лицензию? Убедитесь, что все обязательные поля заполнены.')) {
                                                e.preventDefault();
                                                return false;
                                            }
                                            return true;
                                        });
                                        JS;
                                    $this->registerJs($js);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profile-section">
                        <div class="section-header">
                            <h3 class="profile-section-title">Контактные данные</h3>
                            <?php if (!empty($userData['contacts'])): ?>
                                <?= Html::a(
                                    '<i class="fas fa-edit"></i> Редактировать',
                                    ['update', 'id' => $userData['contacts'][0]['info_id']],
                                    ['class' => 'btn btn-primary edit-btn']
                                ) ?>
                            <?php endif; ?>
                        </div>

                        <?php if (empty($userData['contacts'])): ?>
                            <div class="empty-contacts">
                                <p>Контактные данные не заполнены</p>
                                <?= Html::a(
                                    '<i class="fas fa-plus"></i> Заполнить данные',
                                    ['create', 'user_id' => $userId],
                                    ['class' => 'btn btn-primary add-contact-btn']
                                ) ?>
                            </div>
                        <?php else: ?>
                            <div class="contact-details">
                                <?php $contact = $userData['contacts'][0]; ?>
                                <div class="detail-row">
                                    <div class="detail-label">Телефон:</div>
                                    <div class="detail-value">
                                        <?= !empty($contact['phone_number']) ? Html::encode($contact['phone_number']) : '<span class="text-muted">Не указан</span>' ?>
                                    </div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">Email:</div>
                                    <div class="detail-value">
                                        <?= !empty($contact['email']) ? Html::encode($contact['email']) : '<span class="text-muted">Не указан</span>' ?>
                                    </div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">Дата рождения:</div>
                                    <div class="detail-value">
                                        <?= !empty($contact['birthday']) ? Html::encode(Yii::$app->formatter->asDate($contact['birthday'], 'php:d.m.Y')) : '<span class="text-muted">Не указана</span>' ?>
                                    </div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-label">Пол:</div>
                                    <div class="detail-value">
                                        <?= !empty($contact['gender']) ? Html::encode($contact['gender'] == 1 ? 'Мужской' : 'Женский') : '<span class="text-muted">Не указан</span>' ?>
                                    </div>
                                </div>

                                <!-- Вид спорта -->
                                <?php if (!empty($contact['sport_name'])): ?>
                                    <div class="detail-row">
                                        <div class="detail-label">Вид спорта:</div>
                                        <div class="detail-value"><?= Html::encode($contact['sport_name']) ?></div>
                                    </div>
                                <?php else: ?>
                                    <div class="detail-row">
                                        <div class="detail-label">Вид спорта:</div>
                                        <div class="detail-value"><span class="text-muted">Не указан</span></div>
                                    </div>
                                <?php endif; ?>

                                <!-- Спортивный клуб -->
                                <?php if (!empty($contact['club_name'])): ?>
                                    <div class="detail-row">
                                        <div class="detail-label">Спортивный клуб:</div>
                                        <div class="detail-value"><?= Html::encode($contact['club_name']) ?></div>
                                    </div>
                                <?php else: ?>
                                    <div class="detail-row">
                                        <div class="detail-label">Спортивный клуб:</div>
                                        <div class="detail-value"><span class="text-muted">Не указан</span></div>
                                    </div>
                                <?php endif; ?>

                                <!-- Тренер -->
                                <?php if (!empty($contact['trainer_name'])): ?>
                                    <div class="detail-row">
                                        <div class="detail-label">Тренер:</div>
                                        <div class="detail-value"><?= Html::encode($contact['trainer_name']) ?></div>
                                    </div>
                                <?php else: ?>
                                    <div class="detail-row">
                                        <div class="detail-label">Тренер:</div>
                                        <div class="detail-value"><span class="text-muted">Не указан</span></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
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