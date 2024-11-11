<?php

namespace app\models;

use yii\db\ActiveRecord;

class Prizer extends ActiveRecord
{
    public static function tableName()
    {
        return 'prizer';
    }

    public function getSorevnovaniyas()
    {
        return $this->hasMany(Sorevnovaniya::class, ['id_prizer' => 'id']);
    }

    public function getSportsmenPrizers()
    {
        return $this->hasMany(SportsmenPrizer::class, ['id_prizer' => 'id']);
    }
}
