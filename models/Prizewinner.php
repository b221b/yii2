<?php

namespace app\models;

use yii\db\ActiveRecord;

class Prizewinner extends ActiveRecord
{
    public static function tableName()
    {
        return 'prizewinner';
    }

    public function getCompetitions()
    {
        return $this->hasMany(Competitions::class, ['id_prizewinner' => 'id']);
    }

    public function getSportsmanPrizewinner()
    {
        return $this->hasMany(SportsmanPrizewinner::class, ['id_prizewinner' => 'id']);
    }

    public function rules()
    {
        return [
            [['prize_place', 'reward'], 'required'],
            [['prize_place'], 'integer'],
            [['reward'], 'string', 'max' => 255], 
            [['prize_place'], 'unique', 'targetAttribute' => ['prize_place'], 'message' => 'Запись с таким призовым уже существует.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'prize_place' => 'Призовое место',
            'reward' => 'Награда',
        ];
    }
}
