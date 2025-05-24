<?php

use yii\helpers\Html;

$this->title = 'Письмо отправлено';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="card-body text-center py-4">
                    <i class="fas fa-envelope fa-4x text-success mb-4"></i>
                    <h4>Проверьте ваш email</h4>
                    <p class="text-muted">Мы отправили инструкции по восстановлению пароля на указанный email.</p>
                    <div class="alert alert-light mt-4">
                        <i class="fas fa-info-circle me-2"></i>
                        Не получили письмо? Проверьте папку "Спам" или <?= Html::a('отправьте запрос снова', ['site/request-password-reset']) ?>.
                    </div>

                    <?= Html::a('Ввести токен смены пароля', ['site/verify-token'], [
                        'class' => 'btn btn-primary'
                    ]) ?>

                    <?= Html::a('Вернуться на главную', ['site/index'], ['class' => 'btn btn-outline-secondary']) ?>
                </div>
            </div>
        </div>
    </div>
</div>