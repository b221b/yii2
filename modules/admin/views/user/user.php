<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $users app\models\User[] */

$this->title = 'Статусы пользователей';
$this->params['breadcrumbs'][] = $this->title;

// Регистрируем JS для обработки кликов
$this->registerJs(new JsExpression('
    $(document).on("click", ".user-card-header", function() {
        var card = $(this).closest(".user-card");
        var details = card.find(".user-details");
        var userId = card.data("user-id");
        
        if (details.hasClass("loaded")) {
            details.slideToggle();
        } else {
            $.get("' . Url::to(['/admin/user/details']) . '", {id: userId}, function(data) {
                details.html(data).addClass("loaded").slideDown();
            });
        }
        
        card.toggleClass("expanded");
    });
'));
?>

<div class="user-status-page">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="user-cards-container">
        <?php foreach ($users as $user): ?>
            <div class="user-card" data-user-id="<?= $user->id ?>">
                <div class="user-card-header">
                    <h3><?= Html::encode($user->username) ?></h3>
                    <span class="toggle-icon">+</span>
                </div>

                <div class="user-card-body">
                    <div class="user-status">
                        <?php if (!empty($user->userInfo)): ?>
                            <?php foreach ($user->userInfo as $info): ?>
                                <div class="status-item">
                                    <span class="status-badge <?=
                                                                $info->status === 1 ? 'active' : ($info->status === 2 ? 'pending' : 'inactive')
                                                                ?>">
                                        <?=
                                        $info->status === 1 ? 'Активен' : ($info->status === 2 ? 'На рассмотрении' : 'Не активен')
                                        ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="status-badge no-data">Нет данных</span>
                        <?php endif; ?>
                    </div>

                    <div class="user-actions">
                        <?php if (!empty($user->userInfo)): ?>
                            <?php foreach ($user->userInfo as $info): ?>
                                <div class="action-buttons">
                                    <?= Html::a(
                                        'Активировать',
                                        ['/admin/user/change-status', 'id' => $info->id, 'status' => 1],
                                        [
                                            'class' => 'btn btn-activate',
                                            'title' => 'Активировать',
                                            'data' => [
                                                'method' => 'post',
                                                'confirm' => 'Вы уверены, что хотите активировать этого пользователя?',
                                            ],
                                        ]
                                    ) ?>
                                    <?= Html::a(
                                        'Деактивировать',
                                        ['/admin/user/change-status', 'id' => $info->id, 'status' => 0],
                                        [
                                            'class' => 'btn btn-deactivate',
                                            'title' => 'Деактивировать',
                                            'data' => [
                                                'method' => 'post',
                                                'confirm' => 'Вы уверены, что хотите деактивировать этого пользователя?',
                                            ],
                                        ]
                                    ) ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="user-details" style="display: none;"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>