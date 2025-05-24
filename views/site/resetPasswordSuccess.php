<?php

use yii\helpers\Html;

$this->title = 'Пароль изменен';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h2 class="text-center mb-0"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="card-body text-center py-4">
                    <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
                    <h3>Пароль успешно изменен!</h3>
                    <p>Теперь вы можете войти в систему, используя новый пароль.</p>
                    <?= Html::a('Войти', ['login'], ['class' => 'btn btn-success btn-lg mt-3']) ?>
                </div>
            </div>
        </div>
    </div>
</div>