<?php

namespace app\models;

use yii\db\ActiveRecord;

class CompetitionRegistration extends ActiveRecord
{
    public static function tableName()
    {
        return 'competition_registration';
    }

    public function rules()
    {
        return [
            [['competition_id', 'user_id'], 'required'],
            [['competition_id', 'user_id'], 'integer'],
            [['registration_date'], 'safe'],
            [
                ['competition_id', 'user_id'],
                'unique',
                'targetAttribute' => ['competition_id', 'user_id'],
                'message' => 'Вы уже записаны на это соревнование'
            ],
        ];
    }

    public function getCompetition()
    {
        return $this->hasOne(Competitions::className(), ['id' => 'competition_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
