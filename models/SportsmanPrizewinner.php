<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportsmanPrizewinner extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsman_prizewinner';
    }

    public function getSportsman()
    {
        return $this->hasOne(Sportsman::class, ['id' => 'id_sportsman']);
    }

    public function getPrizewinner()
    {
        return $this->hasOne(Prizewinner::class, ['id' => 'id_prizewinner']);
    }

    public function getSportsmanPrizewinner()
    {
        return $this->hasMany(SportsmanPrizewinner::class, ['id_competitions' => 'id']);
    }
}
