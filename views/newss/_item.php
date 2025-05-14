<div class="news-item">
    <div class="news-image">
        <?php

        use yii\helpers\Html;

        // Определяем изображение в зависимости от вида спорта
        $sportImage = 'https://shkolainternatzmeinogorskaya-r22.gosweb.gosuslugi.ru/netcat_files/48/2472/1671737146_kartinkin_net_p_legkaya_atletika_kartinki_dlya_detei_krasi_25.jpg'; // изображение по умолчанию

        if ($model->sport) {
            switch (strtolower($model->sport->name)) {
                case 'Футбол':
                    $sportImage = 'https://www.sestrikcup.ru/photos/2013/99/max/zp1370500.jpg';
                    break;
                case 'Баскетбол':
                    $sportImage = 'https://sportishka.com/uploads/posts/2021-11/1637335306_92-sportishka-com-p-igra-basketbol-komandnii-sport-foto-100.jpg';
                    break;
                case 'Волейбол':
                    $sportImage = 'https://avatars.mds.yandex.net/i?id=cabc30b40b3a5e0cc05d9c5a44a29772_l-5207283-images-thumbs&n=13';
                    break;
                case 'легкая атлетика':
                    $sportImage = 'https://shkolainternatzmeinogorskaya-r22.gosweb.gosuslugi.ru/netcat_files/48/2472/1671737146_kartinkin_net_p_legkaya_atletika_kartinki_dlya_detei_krasi_25.jpg';
                    break;
                    // добавьте другие виды спорта по необходимости
            }
        }
        ?>
        <img src="<?= $sportImage ?>" alt="<?= Html::encode($model->sport->name ?? 'Новости спорта') ?>">
    </div>

    <div class="news-content">
        <div class="news-meta">
            <span class="news-date"><?= Yii::$app->formatter->asDate($model->event_date) ?></span>
            <?php if ($model->sport): ?>
                <span class="news-sport"><?= Html::encode($model->sport->name) ?></span>
            <?php endif; ?>
        </div>

        <h3 class="news-title"><?= Html::a(Html::encode($model->name), ['view', 'id' => $model->id]) ?></h3>

        <div class="news-excerpt">
            <?= Html::encode(mb_substr($model->description, 0, 150) . '...') ?>
        </div>

        <?php if (!empty($model->organisations)): ?>
            <div class="news-organizers">
                <?php foreach ($model->organisations as $org): ?>
                    <span class="organizer-tag"><?= Html::encode($org->full_name) ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?= Html::a('Читать далее', ['view', 'id' => $model->id], ['class' => 'read-more']) ?>
    </div>
</div>