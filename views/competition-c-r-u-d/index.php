<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

$this->title = 'Соревнования CRUD';
$this->params['breadcrumbs'][] = ['label' => 'Административная часть', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Создать Соревнование', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'name',
            'label' => 'Название',
        ],
        [
            'attribute' => 'event_date',
            'label' => 'Дата проведения',
        ],
        [
            'attribute' => 'structure.name',
            'label' => 'Структура',
        ],
        [
            'attribute' => 'kindOfSport.name',
            'label' => 'Вид спорта',
        ],
        [
            'label' => 'Призеры',
            'value' => function ($model) {
                $prizers = $model->sportsmanPrizewinner; // Получаем всех призеров
                return $prizers ? implode(', ', array_map(fn($prizer) => $prizer->sportsman->name, $prizers)) : '-';
            },
        ],
        [
            'attribute' => 'description',
            'label' => 'Описание',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Действия',
            'template' => '{view} {update} {delete}',
        ],
    ],
]);

echo LinkPager::widget([
    'pagination' => $dataProvider->pagination,
    'options' => [
        'class' => 'pagination justify-content-center', // Центрируем пагинацию
    ],
    'linkOptions' => [
        'class' => 'page-link', // Класс для ссылок
    ],
    'activePageCssClass' => 'active', // Класс для активной страницы
    'disabledPageCssClass' => 'disabled', // Класс для неактивной страницы
    'prevPageLabel' => '&laquo;', // Текст для кнопки "Предыдущая"
    'nextPageLabel' => '&raquo;', // Текст для кнопки "Следующая"
    'firstPageLabel' => 'Первая', // Текст для кнопки "Первая"
    'lastPageLabel' => 'Последняя', // Текст для кнопки "Последняя"
]);

?>