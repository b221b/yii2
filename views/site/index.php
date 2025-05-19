<?php

/** @var yii\web\View $this */

$this->title = 'Городская спортивная лига';
?>

<div class="site-index">

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 text-center rounded-pill bg-light p-3 shadow-sm">Городская спортивная лига</h1>
                <p class="text-center text-muted mt-3">Объединяем спортсменов, тренеров и мероприятия вашего города</p>
            </div>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="container mt-5">
        <?= \app\widgets\UpcomingEventsWidget::widget(['limit' => 5]); ?>
    </div>

    <!-- Main Content -->
    <div class="container main-content mt-5">
        <h2 class="section-title text-center mb-5">Навигация по системе</h2>

        <div class="row g-4">
            <!-- Спортсмены -->
            <div class="col-md-4 col-sm-6">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsmans/index']) ?>" class="card-link">
                    <div class="feature-card">
                        <div class="card-image" style="background-image: url('img/cards/vV_OdrHqMKw.jpg')"></div>
                        <div class="card-body">
                            <h3>Спортсмены</h3>
                            <p>Просмотр спортсменов по видам спорта</p>
                            <span class="card-arrow">→</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Команды тренеров -->
            <div class="col-md-4 col-sm-6">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsman-trainers/index']) ?>" class="card-link">
                    <div class="feature-card">
                        <div class="card-image" style="background-image: url('img/cards/scale_1200.png')"></div>
                        <div class="card-body">
                            <h3>Команды тренеров</h3>
                            <p>Список тренерских составов</p>
                            <span class="card-arrow">→</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Многопрофильные атлеты -->
            <div class="col-md-4 col-sm-6">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsman-kind-of-sport/index']) ?>" class="card-link">
                    <div class="feature-card">
                        <div class="card-image" style="background-image: url('img/cards/123.webp')"></div>
                        <div class="card-body">
                            <h3>Многопрофильные атлеты</h3>
                            <p>Спортсмены в нескольких дисциплинах</p>
                            <span class="card-arrow">→</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- События за период -->
            <div class="col-md-4 col-sm-6">
                <a href="<?= Yii::$app->urlManager->createUrl(['/competition-organisation/index']) ?>" class="card-link">
                    <div class="feature-card">
                        <div class="card-image" style="background-image: url('img/cards/sorev6.jpg')"></div>
                        <div class="card-body">
                            <h3>События за период</h3>
                            <p>Календарь мероприятий</p>
                            <span class="card-arrow">→</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Медалисты -->
            <!-- есть баги в коде, надо фиксануть -->
            <!-- <div class="col-md-4 col-sm-6">
                <a href="<?= Yii::$app->urlManager->createUrl(['/prizewinner/index']) ?>" class="card-link">
                    <div class="feature-card">
                        <div class="card-image" style="background-image: url('img/cards/prizer7.jpeg')"></div>
                        <div class="card-body">
                            <h3>Медалисты</h3>
                            <p>Лучшие спортсмены по итогам соревнований</p>
                            <span class="card-arrow">→</span>
                        </div>
                    </div>
                </a>
            </div> -->

            <!-- Мероприятия по сооружениям -->
             <!-- юзлес блок -->
            <!-- <div class="col-md-4 col-sm-6">
                <a href="<?= Yii::$app->urlManager->createUrl(['/competitions-structure/index']) ?>" class="card-link">
                    <div class="feature-card">
                        <div class="card-image" style="background-image: url('img/cards/sorevVidsporta8.jpg')"></div>
                        <div class="card-body">
                            <h3>Мероприятия по сооружениям</h3>
                            <p>Расписание по спортивным объектам</p>
                            <span class="card-arrow">→</span>
                        </div>
                    </div>
                </a>
            </div> -->

            <!-- Активность клубов -->
            <div class="col-md-4 col-sm-6">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sports-club/index']) ?>" class="card-link">
                    <div class="feature-card">
                        <div class="card-image" style="background-image: url('img/cards/clubs9.webp')"></div>
                        <div class="card-body">
                            <h3>Активность клубов</h3>
                            <p>Статистика спортивных клубов</p>
                            <span class="card-arrow">→</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Тренеры -->
            <div class="col-md-4 col-sm-6">
                <a href="<?= Yii::$app->urlManager->createUrl(['/trainers/index']) ?>" class="card-link">
                    <div class="feature-card">
                        <div class="card-image" style="background-image: url('https://hcnh.ru/upload/iblock/400/400d299e3383c9047e46ffc773d767e6.jpg')"></div>
                        <div class="card-body">
                            <h3>Тренеры</h3>
                            <p>Тренерский состав по видам спорта</p>
                            <span class="card-arrow">→</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Неучаствующие атлеты -->
            <div class="col-md-4 col-sm-6">
                <a href="<?= Yii::$app->urlManager->createUrl(['/sportsman-competitions/index']) ?>" class="card-link">
                    <div class="feature-card">
                        <div class="card-image" style="background-image: url('img/cards/otst11.jpg')"></div>
                        <div class="card-body">
                            <h3>Неучаствующие атлеты</h3>
                            <p>Спортсмены без текущих соревнований</p>
                            <span class="card-arrow">→</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-section mt-5">
        <div class="container">
            <h2 class="section-title text-center mb-4">Наши спортивные объекты</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3831.10021723342!2d39.712859661850594!3d47.23620567845806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40e3bbd25efc8dab%3A0xe71795934da757ba!2z0JTQvtC90YHQutC-0Lkg0LPQvtGB0YPQtNCw0YDRgdGC0LLQtdC90L3Ri9C5INGC0LXRhdC90LjRh9C10YHQutC40Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgg!5e0!3m2!1sru!2sru!4v1717487879917!5m2!1sru!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Статистика лиги</h2>
            <div class="row justify-content-center">
                <?php
                // Получаем данные из БД
                $sportsmanCount = \app\models\Sportsman::find()->count();
                $trainerCount = \app\models\Trainers::find()->count();
                $sportTypesCount = \app\models\KindOfSport::find()->count();

                $upcomingEventsCount = \app\models\Competitions::find()
                    ->where(['>=', 'event_date', date('Y-m-d')])
                    ->count();

                $pastEventsCount = \app\models\Competitions::find()
                    ->where(['<', 'event_date', date('Y-m-d')])
                    ->count();
                ?>

                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <a href="site/table-data?table=sportsman" class="stat-link">
                        <div class="stat-item bg-white rounded-4 p-4 text-center shadow-sm h-100 transition-all">
                            <div class="stat-number fs-2 fw-bold text-primary" data-count="<?= $sportsmanCount ?>">0</div>
                            <div class="stat-label text-muted mt-2">Спортсменов</div>
                            <div class="mt-3">
                                <i class="fas fa-running fa-2x text-primary"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <a href="site/table-data?table=trainers" class="stat-link">
                        <div class="stat-item bg-white rounded-4 p-4 text-center shadow-sm h-100 transition-all">
                            <div class="stat-number fs-2 fw-bold text-success" data-count="<?= $trainerCount ?>">0</div>
                            <div class="stat-label text-muted mt-2">Тренеров</div>
                            <div class="mt-3">
                                <i class="fas fa-user-tie fa-2x text-success"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <a href="site/table-data?table=kind_of_sport" class="stat-link">
                        <div class="stat-item bg-white rounded-4 p-4 text-center shadow-sm h-100 transition-all">
                            <div class="stat-number fs-2 fw-bold text-info" data-count="<?= $sportTypesCount ?>">0</div>
                            <div class="stat-label text-muted mt-2">Видов спорта</div>
                            <div class="mt-3">
                                <i class="fas fa-trophy fa-2x text-info"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <a href="competitions/index" class="stat-link">
                        <div class="stat-item bg-white rounded-4 p-4 text-center shadow-sm h-100 transition-all">
                            <div class="stat-number fs-2 fw-bold text-warning" data-count="<?= $upcomingEventsCount ?>">0</div>
                            <div class="stat-label text-muted mt-2">Предстоящих мероприятий</div>
                            <div class="mt-3">
                                <i class="fas fa-calendar-alt fa-2x text-warning"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <a href="competitions/index" class="stat-link">
                        <div class="stat-item bg-white rounded-4 p-4 text-center shadow-sm h-100 transition-all">
                            <div class="stat-number fs-2 fw-bold text-danger" data-count="<?= $pastEventsCount ?>">0</div>
                            <div class="stat-label text-muted mt-2">Проведенных мероприятий</div>
                            <div class="mt-3">
                                <i class="fas fa-history fa-2x text-danger"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

</style>

<script>

</script>