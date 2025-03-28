<?php

namespace app\models;

use yii\db\ActiveRecord;

class KindOfSport extends ActiveRecord
{
    public static function tableName()
    {
        return 'kind_of_sport';
    }

    public function getSportsmanKindOfSport()
    {
        return $this->hasMany(SportsmanKindOfSport::class, ['id_kind_of_sport' => 'id']);
    }

    public function getTrainers()
    {
        return $this->hasOne(Trainers::class, ['id' => 'id_trainers']);
    }

    public function getCompetitions()
    {
        return $this->hasMany(Competitions::class, ['id_kind_of_sport' => 'id']);
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
        ];
    }
}
