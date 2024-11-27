<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Sorevnovaniya;
use yii\helpers\Html;

class UpcomingEventsWidget extends Widget
{
    public $limit = 5;

    public function init()
    {
        parent::init(); // Вызов родительского метода init

        // Нормализация свойства $limit
        if (!is_int($this->limit) || $this->limit <= 0) {
            $this->limit = 5;
        }
    }

    public function run()
    {
        $upcomingEvents = Sorevnovaniya::find()
            ->where(['>', 'data_provedeniya', date('Y-m-d')])
            ->orderBy(['data_provedeniya' => SORT_ASC])
            ->limit($this->limit)
            ->all();

        return $this->render('upcoming-events', [
            'events' => $upcomingEvents,
        ]);
    }
}
