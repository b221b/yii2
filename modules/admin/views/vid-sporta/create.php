<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VidSporta $model */

$this->title = 'Create Vid Sporta';
$this->params['breadcrumbs'][] = ['label' => 'Vid Sportas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vid-sporta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
