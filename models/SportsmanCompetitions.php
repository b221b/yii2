<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportsmanCompetitions extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsman_competitions';
    }

    public function getSportsman()
    {
        return $this->hasOne(Sportsman::class, ['id' => 'id_sportsman']);
    }

    public function getCompetitions()
    {
        return $this->hasOne(Competitions::class, ['id' => 'id_competitions']);
    }

    public function rules()
    {
        return [
            [['id_sportsman', 'id_competitions'], 'required'], 
            [['id_sportsman', 'id_competitions'], 'integer'],
            [['id_sportsman', 'id_competitions'], 'unique', 'targetAttribute' => ['id_sportsman', 'id_competitions'], 'message' => 'Запись с таким спортсменом и соревнованием уже существует.'], 
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id_sportsman' => 'Спортсмен',
            'id_competitions' => 'Название соревнования',
        ];
    }
}
