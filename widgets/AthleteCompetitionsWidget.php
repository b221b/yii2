<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Competitions;
use app\models\CompetitionRegistration;
use Yii;

class AthleteCompetitionsWidget extends Widget
{
    public $userId;

    public function run()
    {
        $currentDate = date('Y-m-d');

        $competitions = Competitions::find()
            ->innerJoinWith('registrations')
            ->where(['competition_registration.user_id' => $this->userId])
            ->andWhere(['<', 'competitions.event_date', $currentDate])
            ->orderBy(['competitions.event_date' => SORT_DESC])
            ->all();

        $output = Html::beginTag('div', ['class' => 'sport-widget']);

        $output .= Html::beginTag('div', ['class' => 'sport-widget-header']);
        $output .= Html::tag(
            'h3',
            Html::tag('i', '', ['class' => 'fas fa-history']) .
                'История участия',
            ['class' => 'sport-widget-title']
        );
        $output .= Html::endTag('div');

        $output .= Html::beginTag('div', ['class' => 'sport-widget-body']);

        if (empty($competitions)) {
            $output .= Html::tag('div', 'Нет данных об участии в соревнованиях', [
                'class' => 'text-muted text-center'
            ]);
        } else {
            $output .= Html::beginTag('div', ['class' => 'sport-cards']);

            foreach ($competitions as $competition) {
                $output .= Html::beginTag('div', ['class' => 'sport-card']);

                $output .= Html::beginTag('div', ['class' => 'sport-card-content']);

                $output .= Html::tag('h4', Html::encode($competition->name), ['class' => 'sport-card-title']);

                $output .= Html::beginTag('div', ['class' => 'sport-card-meta']);
                $output .= Html::tag(
                    'span',
                    Html::tag('i', '', ['class' => 'far fa-calendar mr-2']) .
                        Yii::$app->formatter->asDate($competition->event_date)
                );
                $output .= Html::tag(
                    'span',
                    'Завершено',
                    ['class' => 'sport-badge badge-completed', 'style' => 'background-color: #ffebee; color: #d32f2f;']
                );
                $output .= Html::endTag('div');

                if ($competition->description) {
                    $output .= Html::tag(
                        'div',
                        Html::encode($competition->description),
                        ['class' => 'sport-card-description']
                    );
                }

                $output .= Html::a(
                    Html::tag('i', '', ['class' => 'fas fa-arrow-right']) . ' Подробности',
                    ['/competitions/view', 'id' => $competition->id],
                    ['class' => 'sport-btn btn-view']
                );

                $output .= Html::endTag('div'); // card-content
                $output .= Html::endTag('div'); // card
            }

            $output .= Html::endTag('div'); // sport-cards
        }

        $output .= Html::endTag('div'); // widget-body
        $output .= Html::endTag('div'); // widget

        return $output;
    }
}
