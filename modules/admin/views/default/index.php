<?php

use yii\helpers\Url;

$this->title = 'Административная часть';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>

    <!-- <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>

    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p> -->

    <p>
        <?= \yii\helpers\Html::a('Таблица Спортсмены', Url::to(['sportsmen/index']), ['class' => 'btn btn-primary']) ?>
        <?= \yii\helpers\Html::a('Таблица Спорт Клубы', Url::to(['sport-club/index']), ['class' => 'btn btn-primary']) ?>
    </p>

</div>