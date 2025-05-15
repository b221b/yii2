<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Competitions;
use yii\helpers\Html;

class UpcomingEventsWidget extends Widget
{
    public $limit = 5;
    public $showRegisterButton = true; // Новая опция для отображения кнопки записи

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

        return $this->render('upcoming-events', [
            'events' => $upcomingEvents,
            'showRegisterButton' => $this->showRegisterButton,
        ]);
    }
}