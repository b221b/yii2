<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportsClub extends ActiveRecord
{
    public static function tableName()
    {
        return 'sports_club';
    }

    public function getSportsman()
    {
        return $this->hasMany(Sportsman::class, ['id_sports_club' => 'id']);
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
