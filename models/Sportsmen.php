<?php

namespace app\models;

use yii\db\ActiveRecord;

class Sportsmen extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsmen';
    }

    public function getSportClub()
    {
        return $this->hasOne(SportClub::class, ['id' => 'id_sport_club']);
    }

    public function getSportsmenPrizers()
    {
        return $this->hasMany(SportsmenPrizer::class, ['id_sportsmen' => 'id']);
    }

    public function getSportsmenSorevnovaniyas()
    {
        return $this->hasMany(SportsmenSorevnovaniya::class, ['id_sportsmen' => 'id']);
    }

    public function getSportsmenTreners()
    {
        return $this->hasMany(SportsmenTreners::class, ['id_sportsmen' => 'id']);
    }

    public function getSportsmenVidSporta()
    {
        return $this->hasMany(SportsmenVidSporta::class, ['id_sportsmen' => 'id']);
    }

    public $id_vid_sporta;
    public $sport_count;

    public function rules()
    {
        return [
            // [['id'], 'required', 'message' => 'Пожалуйста, выберите спортсмена.'],
            [['razryad'], 'integer', 'message' => 'Разряд должен быть целым числом.'],
            [['razryad'], 'default', 'value' => null],
            [['razryad', 'id_vid_sporta'], 'integer'],
            [['id_vid_sporta'], 'default', 'value' => null],

            [['name', 'razryad', 'id_sport_club'], 'required'],
            [['razryad', 'id_sport_club'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'razryad' => 'Разряд спортсмена',
            'id_vid_sporta' => 'Вид спорта',
            'id' => 'Спортсмены',
            'sport_count' => 'Количество видов спорта',
            'name' => 'Имя спортсмена',
            'id_sport_club' => 'Спортивный клуб',
        ];
    }
}
