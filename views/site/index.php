<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>

<div class="site-index">


    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Добро пожаловать!</h1>

        <p class="lead">Вы успешно попали в веб-приложение Титаренко Мирослава</p>

        <!-- <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <?= \app\widgets\UpcomingEventsWidget::widget(['limit' => 5]); ?>

    <div class="body-content">

        <div class="row">

            <!-- Блоки с изображением и текстом -->
            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/structure/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/1660195230_1-sportishka-com-p-otkritie-ploskostnie-sportivnie-sooruzheni-1.jpg" class="card-img-top" alt="Image 1">
                        <div class="card-body">
                            <p class="card-text">Спортивные сооружения</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsmens/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/vV_OdrHqMKw.jpg" class="card-img-top" alt="Image 2">
                        <div class="card-body">
                            <p class="card-text">Спортсмены по видам спорта</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsmen-treners/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/scale_1200.png" class="card-img-top" alt="Image 3">
                        <div class="card-body">
                            <p class="card-text">Тренеры и их подопечные</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsmen-vid-sporta/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/123.webp" class="card-img-top" alt="Image 4">
                        <div class="card-body">
                            <p class="card-text">Спортсмены по количеству видов спорта</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sorevnovaniya-org/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/sorev6.jpg" class="card-img-top" alt="Image 6">
                        <div class="card-body">
                            <p class="card-text">Перечень соревнований по периоду и организатору</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/prizer/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/prizer7.jpeg" class="card-img-top" alt="Image 7">
                        <div class="card-body">
                            <p class="card-text">Перечень призеров</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sorevnovaniya-structure/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/sorevVidsporta8.jpg" class="card-img-top" alt="Image 8">
                        <div class="card-body">
                            <p class="card-text">Перечень соревнований в сооружениях и виду спорта</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sport-club/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/clubs9.webp" class="card-img-top" alt="Image 9">
                        <div class="card-body">
                            <p class="card-text">Перечень клубов и участников соревнований по периоду</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/treners/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/treners10.jpg" class="card-img-top" alt="Image 10">
                        <div class="card-body">
                            <p class="card-text">Список тренеров по виду спорта</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsmen-sorevnovaniya/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/otst11.jpg" class="card-img-top" alt="Image 11">
                        <div class="card-body">
                            <p class="card-text">Список спортсменов не участвовавших в соревах по периоду</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/org/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/orgs12.webp" class="card-img-top" alt="Image 12">
                        <div class="card-body">
                            <p class="card-text">Список организаторов по периоду</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-3">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sport/index']) ?>" class="card-link">
                    <div class="card">
                        <img src="img/cards/sooryzheniya13.webp" class="card-img-top" alt="Image 13">
                        <div class="card-body">
                            <p class="card-text">Список сооружений по периоду</p>
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