<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" href="../../web/css/about.css">

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="author-info">
        <img class="avatar">
        <p>Автор: Титаренко Мирослав Дмитриевич</p>
        <p>Группа: ВИС43</p>
    </div>

</div>

<p>
    This is the About page. You may modify the following file to customize its content:
</p>

<code><?= __FILE__ ?></code>