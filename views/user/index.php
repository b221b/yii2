<?php

use yii\bootstrap5\Nav;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>

<h2>Записи для выбранного юзера:</h2>

<?php if ($usersDataProvider && count($usersDataProvider->models) > 0): ?>
    <ul class="list-group">
        <?php foreach ($usersDataProvider->models as $user): ?>
            <li class="list-group-item">
                <strong>Имя юзера:</strong> <?= Html::encode($user['username']) ?><br>
                <strong>Номер телефона:</strong> <?= Html::encode($user['phone_number']) ?><br>
                <strong>Почта:</strong> <?= Html::encode($user['email']) ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Юзеры не найдены</p>
<?php endif; ?>

<div class="main-menu__nav">
    <?= Nav::widget([
        'options' => ['class' => 'main-menu__list navbar-nav'],
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