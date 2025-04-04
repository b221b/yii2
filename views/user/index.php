<?php

use yii\bootstrap5\Nav;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if ($usersDataProvider && count($usersDataProvider->models) > 0): ?>
    <div class="row justify-content-center">
        <?php foreach ($usersDataProvider->models as $user): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><?= Html::encode($user['username']) ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <i class="fas fa-phone mr-2"></i> <?= Html::encode($user['phone_number']) ?><br>
                            <i class="fas fa-envelope mr-2"></i> <?= Html::encode($user['email']) ?>
                        </p>
                    </div>
                    <?php if (isset($user['id'])): ?>
                        <div class="card-footer bg-transparent">
                            <?= Html::a('Просмотр', ['view', 'id' => $user['id']], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                        </div>
                    <?php endif; ?>

                    <div class="main-menu__nav ">
                        <?= Nav::widget([
                            'options' => ['class' => 'main-menu__list '],
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
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-warning">
        <i class="fas fa-exclamation-circle"></i> Пользователи не найдены
    </div>
<?php endif; ?>