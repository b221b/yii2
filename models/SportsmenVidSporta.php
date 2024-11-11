<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportsmenVidSporta extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsmen_vidSporta';
    }

    public function getSportsmen()
    {
        return $this->hasOne(Sportsmen::class, ['id' => 'id_sportsmen']);
    }

    public function getVidSporta()
    {
        return $this->hasOne(VidSporta::class, ['id' => 'id_vid_sporta']);
    }
}