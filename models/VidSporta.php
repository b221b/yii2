<?php

namespace app\models;

use yii\db\ActiveRecord;

class VidSporta extends ActiveRecord
{
    public static function tableName()
    {
        return 'vid_sporta';
    }

    public function getSportsmenVidSporta()
    {
        return $this->hasMany(SportsmenVidSporta::class, ['id_vid_sporta' => 'id']);
    }

    public function getTreners()
    {
        return $this->hasOne(Treners::class, ['id' => 'id_treners']);
    }

    public function getSorevnovaniyas()
    {
        return $this->hasMany(Sorevnovaniya::class, ['id_vid_sporta' => 'id']);
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
