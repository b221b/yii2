<div class="last-news">
    <h4>Последние события</h4>
    <ul>
        <?php

        use yii\helpers\Html;

        foreach ($news as $item): ?>
            <li>
                <?= Html::a(Html::encode($item->name), ['/news/view', 'id' => $item->id]) ?>
                <span class="date"><?= Yii::$app->formatter->asDate($item->event_date) ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>