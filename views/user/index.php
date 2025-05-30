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
                'discharge' => $user['discharge'] ?? null,
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
                'discharge' => $user['discharge'] ?? null,
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
            <div class="profile-card">
                <!-- Шапка профиля -->
                <div class="profile-header">
                    <div class="profile-avatar">
                        <?php if (!empty($userData['avatar'])): ?>
                            <img src="<?= Html::encode($userData['avatar']) ?>" alt="Аватар" class="avatar-image">
                        <?php else: ?>
                            <div class="avatar-initials">
                                <?= mb_substr($userData['username'], 0, 1, 'UTF-8') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h1 class="profile-name"><?= Html::encode($userData['username']) ?></h1>

                    <?php if (Yii::$app->user->identity->status_id == \app\models\User::ROLE_MANAGER): ?>
                        <div class="alert" style="margin: 20px 0;">
                            Вы менеджер
                        </div>
                    <?php endif; ?>

                    <?php if (Yii::$app->user->identity->status_id == \app\models\User::ROLE_USER): ?>
                        <div class="alert" style="margin: 20px 0;">
                            Вы пользователь
                        </div>
                    <?php endif; ?>

                    <?php if (Yii::$app->user->identity->status_id == \app\models\User::ROLE_ADMIN): ?>
                        <div class="alert" style="margin: 20px 0;">
                            Вы администратор
                        </div>
                    <?php endif; ?>

                    <div class="profile-status <?= $userData['status'] === 1 ? 'status-active' : ($userData['status'] === 2 ? 'status-pending' : 'status-inactive') ?>">
                        <?= Html::encode($userData['status'] === 1 ? 'Активная лицензия' : ($userData['status'] === 2 ? 'Лицензия на рассмотрении' : 'Лицензия неактивна')) ?>
                    </div>

                    <?php if ($userData['status'] === 0): ?>
                        <?= Html::a(
                            '<span>Оформить лицензию</span>',
                            ['/user/request-license', 'id' => $userData['contacts'][0]['info_id']],
                            [
                                'class' => 'license-btn',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Вы уверены, что хотите подать заявку на лицензию?',
                                ]
                            ]
                        ) ?>
                    <?php endif; ?>
                </div>

                <!-- Основная информация -->
                <div class="profile-sections">
                    <!-- Контактная информация -->
                    <div class="profile-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-user-circle"></i> Контактная информация
                            </h2>
                            <?php if (!empty($userData['contacts'])): ?>
                                <?= Html::a(
                                    '<i class="fas fa-pencil-alt"></i>',
                                    ['update', 'id' => $userData['contacts'][0]['info_id']],
                                    ['class' => 'edit-btn']
                                ) ?>
                            <?php endif; ?>
                        </div>

                        <?php if (empty($userData['contacts'])): ?>
                            <div class="empty-section">
                                <p>Контактные данные не заполнены</p>
                                <?= Html::a(
                                    'Добавить информацию',
                                    ['create', 'user_id' => $userId],
                                    ['class' => 'add-btn']
                                ) ?>
                            </div>
                        <?php else: ?>
                            <?php $contact = $userData['contacts'][0]; ?>
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">Телефон</div>
                                    <div class="info-value">
                                        <?= !empty($contact['phone_number']) ? Html::encode($contact['phone_number']) : '<span class="empty-field">Не указан</span>' ?>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">Email</div>
                                    <div class="info-value">
                                        <?= !empty($contact['email']) ? Html::encode($contact['email']) : '<span class="empty-field">Не указан</span>' ?>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">Дата рождения</div>
                                    <div class="info-value">
                                        <?= !empty($contact['birthday']) ? Html::encode(Yii::$app->formatter->asDate($contact['birthday'], 'php:d.m.Y')) : '<span class="empty-field">Не указана</span>' ?>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">Пол</div>
                                    <div class="info-value">
                                        <?= !empty($contact['gender']) ? Html::encode($contact['gender'] == 1 ? 'Мужской' : 'Женский') : '<span class="empty-field">Не указан</span>' ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Спортивная информация -->
                    <div class="profile-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-running"></i> Спортивная информация
                            </h2>
                        </div>

                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Вид спорта</div>
                                <div class="info-value">
                                    <?= !empty($contact['sport_name']) ? Html::encode($contact['sport_name']) : '<span class="empty-field">Не указан</span>' ?>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Спортивный клуб</div>
                                <div class="info-value">
                                    <?= !empty($contact['club_name']) ? Html::encode($contact['club_name']) : '<span class="empty-field">Не указан</span>' ?>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Тренер</div>
                                <div class="info-value">
                                    <?= !empty($contact['trainer_name']) ? Html::encode($contact['trainer_name']) : '<span class="empty-field">Не указан</span>' ?>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Разряд</div>
                                <div class="info-value">
                                    <?= !empty($contact['discharge']) ? Html::encode($contact['discharge']) : '<span class="empty-field">Не указан</span>' ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="empty-profile">
            <i class="fas fa-user-slash"></i>
            <p>Пользователь не найден</p>
        </div>
    <?php endif; ?>

    <?= \app\widgets\UserRegistrationsWidget::widget() ?>



    <?= \app\widgets\EventApplicationsWidget::widget() ?>

</div>