<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sportsmen $model */

$this->title = 'Создать спортсмена';
$this->params['breadcrumbs'][] = ['label' => 'Спортсмены', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportsmen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php if ($model->hasErrors()): ?>
    <div class="alert alert-danger">
        <?= Html::encode($model->getFirstError('name')) ?>
        <?= Html::encode($model->getFirstError('discharge')) ?>
        <?= Html::encode($model->getFirstError('id_sports_club')) ?>
    </div>
<?php endif; ?>
