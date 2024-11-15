<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportClub extends ActiveRecord
{
    public static function tableName()
    {
        return 'sport_club';
    }

    public function getSportsmen()
    {
        return $this->hasMany(Sportsmen::class, ['id_sport_club' => 'id']);
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
