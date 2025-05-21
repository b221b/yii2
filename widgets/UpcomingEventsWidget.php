<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Competitions;
use app\models\CompetitionRegistration;
use yii\helpers\Html;

class UpcomingEventsWidget extends Widget
{
    public $limit = 5;
    public $showRegisterButton = true;

    public function init()
    {
        parent::init();

        if (!is_int($this->limit) || $this->limit <= 0) {
            $this->limit = 5;
        }
    }

    public function run()
    {
        $upcomingEvents = Competitions::find()
            ->where(['>', 'event_date', date('Y-m-d')])
            ->orderBy(['event_date' => SORT_ASC])
            ->limit($this->limit)
            ->all();

        // Получаем ID соревнований, на которые пользователь уже зарегистрирован
        $userRegisteredCompetitions = [];
        if (!\Yii::$app->user->isGuest) {
            $userRegisteredCompetitions = CompetitionRegistration::find()
                ->select('competition_id')
                ->where(['user_id' => \Yii::$app->user->id])
                ->column();
        }

        return $this->render('upcoming-events', [
            'events' => $upcomingEvents,
            'showRegisterButton' => $this->showRegisterButton,
            'userRegisteredCompetitions' => $userRegisteredCompetitions,
        ]);
    }
}
