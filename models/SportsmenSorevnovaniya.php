<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportsmenSorevnovaniya extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsmen_sorevnovaniya';
    }

    public function getSportsmen()
    {
        return $this->hasOne(Sportsmen::class, ['id' => 'id_sportsmen']);
    }

    public function getSorevnovaniya()
    {
        return $this->hasOne(Sorevnovaniya::class, ['id' => 'id_sorevnovaniya']);
    }
}
