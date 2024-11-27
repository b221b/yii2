<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="author-info">
        <img class="avatar">

        <div class="testimonial-one__meta">
            <h5 class="testimonial-one__title">Мирослав Титаренко</h5>
            <span class="testimonial-one__designation">Группа: ВИС43</span>
        </div><!-- testimonial-meta -->

        <!-- <p>Автор: Титаренко Мирослав Дмитриевич</p>
        <p>Группа: ВИС43</p> -->
    </div>

    <div class="testimonial-one__quote">
        Студент Донского Государственного Технического Университета.
        Факультет - Информатика и Вычислительная Техника.
        Специальность - Информационные Системы и технологии.
        Группа ВИС43.
    </div><!-- testimonial-quote -->
</div>

<!-- <p>
    This is the About page. You may modify the following file to customize its content:
</p>

<code><?= __FILE__ ?></code> -->
