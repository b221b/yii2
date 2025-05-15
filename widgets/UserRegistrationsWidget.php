<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\CompetitionRegistration;

class UserRegistrationsWidget extends Widget
{
    public function run()
    {
        if (\Yii::$app->user->isGuest) {
            return '';
        }

        $registrations = CompetitionRegistration::find()
            ->joinWith(['competition' => function ($query) {
                $query->joinWith(['kindOfSport']);
            }])
            ->where(['competition_registration.user_id' => \Yii::$app->user->id])
            ->orderBy('competitions.event_date ASC')
            ->all();

        return $this->render('userRegistrations', [
            'registrations' => $registrations
        ]);
    }
}
