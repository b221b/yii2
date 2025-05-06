<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\CompetitionNews;

class LastNewsWidget extends Widget
{
    public $limit = 5;

    public function run()
    {
        $news = CompetitionNews::find()
            ->orderBy('event_date DESC')
            ->limit($this->limit)
            ->all();

        return $this->render('lastNews', [
            'news' => $news,
        ]);
    }
}
