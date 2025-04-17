<?php

/** @var yii\web\View $this */

$this->title = 'Городская спортивная лига';
?>

<div class="jumbotron text-center bg-transparent mt-5 mb-5">
    </div>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Добро пожаловать!</h1>

        <p class="lead">Вы успешно попали в веб-приложение Титаренко Мирослава</p>

        <!-- <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <?= \app\widgets\TableSearchWidget::widget() ?>
    </div>

    <?= \app\widgets\UpcomingEventsWidget::widget(['limit' => 5]); ?>

    <div class="body-content">

        <div class="row">

            <!-- Блоки с изображением и текстом -->

            <!-- не реализован -->
            <!-- <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/structure/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/1660195230_1-sportishka-com-p-otkritie-ploskostnie-sportivnie-sooruzheni-1.jpg" class="card-img-top" alt="Image 1">
                        <div class="card-body">
                            <p class="card-text">Спортивные сооружения</p>
                        </div>
                    </div>
                </a>
            </div> -->

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsmans/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/vV_OdrHqMKw.jpg" class="card-img-top" alt="Image 2">
                        <div class="card-body">
                            <p class="card-text">Спортсмены (вид спорта)</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsman-trainers/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/scale_1200.png" class="card-img-top" alt="Image 3">
                        <div class="card-body">
                            <p class="card-text">Команды тренеров</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsman-kind-of-sport/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/123.webp" class="card-img-top" alt="Image 4">
                        <div class="card-body">
                            <p class="card-text">Многопрофильные атлеты</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/competition-organisation/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/sorev6.jpg" class="card-img-top" alt="Image 6">
                        <div class="card-body">
                            <p class="card-text">События за период</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/prizewinner/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/prizer7.jpeg" class="card-img-top" alt="Image 7">
                        <div class="card-body">
                            <p class="card-text">Медалисты</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/competitions-structure/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/sorevVidsporta8.jpg" class="card-img-top" alt="Image 8">
                        <div class="card-body">
                            <p class="card-text">Перечень мероприятий по сооружениям</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sports-club/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/clubs9.webp" class="card-img-top" alt="Image 9">
                        <div class="card-body">
                            <p class="card-text">Активность клубов</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/trainers/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/treners10.jpg" class="card-img-top" alt="Image 10">
                        <div class="card-body">
                            <p class="card-text">Тренеры (вид спорта)</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsman-competitions/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/otst11.jpg" class="card-img-top" alt="Image 11">
                        <div class="card-body">
                            <p class="card-text">Неучаствующие атлеты</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/organisations/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/orgs12.webp" class="card-img-top" alt="Image 12">
                        <div class="card-body">
                            <p class="card-text">Активность организаторов</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sport/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/sooryzheniya13.webp" class="card-img-top" alt="Image 13">
                        <div class="card-body">
                            <p class="card-text">Арены и события</p>
                        </div>
                    </div>
                </a>
            </div>

            <!--Google Map Start-->
            <section class="google-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3831.10021723342!2d39.712859661850594!3d47.23620567845806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40e3bbd25efc8dab%3A0xe71795934da757ba!2z0JTQvtC90YHQutC-0Lkg0LPQvtGB0YPQtNCw0YDRgdGC0LLQtdC90L3Ri9C5INGC0LXRhdC90LjRh9C10YHQutC40Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgg!5e0!3m2!1sru!2sru!4v1717487879917!5m2!1sru!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </section>
            <!--Google Map End-->
        </div>

    </div>
</div>