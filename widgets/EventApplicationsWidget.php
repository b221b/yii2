<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\CompetitionApplications;
use yii\helpers\Html;

class EventApplicationsWidget extends Widget
{
    public function run()
    {
        if (\Yii::$app->user->identity->status_id !== \app\models\User::ROLE_MANAGER) {
            return ''; // Виджет показывается только менеджерам
        }

        $pendingApplications = CompetitionApplications::find()
            ->where(['status' => 'pending'])
            ->orderBy(['created_at' => SORT_ASC])
            ->all();

        return $this->render('event-applications', [
            'applications' => $pendingApplications,
        ]);
    }
}
