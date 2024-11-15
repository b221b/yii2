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
        return $this->hasOne(VidSporta::class, ['id' => 'id_vid_sporta']); // Связываем по id_vid_sporta
    }


    public function rules()
    {
        return [
            [['name', 'id_vid_sporta'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'id_vid_sporta' => 'Вид спорта',
        ];
    }
}
