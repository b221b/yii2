<?php

namespace app\models;

use yii\db\ActiveRecord;

class Treners extends ActiveRecord
{
    public static function tableName()
    {
        return 'treners';
    }

    public function getSportsmenTreners()
    {
        return $this->hasMany(SportsmenTreners::class, ['id_treners' => 'id']);
    }

    public function getVidSporta()
    {
        return $this->hasOne(VidSporta::class, ['id_treners' => 'id']);
    }
    
}