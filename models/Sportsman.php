<?php

namespace app\models;

use yii\db\ActiveRecord;

class Sportsman extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsman';
    }

    public function getSportsClub()
    {
        return $this->hasOne(SportsClub::class, ['id' => 'id_sports_club']);
    }

    public function getSportsmanPrizewinners()
    {
        return $this->hasMany(SportsmanPrizewinner::class, ['id_sportsman' => 'id']);
    }

    public function getSportsmanCompetitions()
    {
        return $this->hasMany(SportsmanCompetitions::class, ['id_sportsman' => 'id']);
    }

    public function getSportsmanTrainers()
    {
        return $this->hasMany(SportsmanTrainers::class, ['id_sportsman' => 'id']);
    }

    public function getSportsmanKindOfSport()
    {
        return $this->hasMany(SportsmanKindOfSport::class, ['id_sportsman' => 'id']);
    }

    public $id_kind_of_sport;
    public $sport_count;

    public function rules()
    {
        return [
            // [['id'], 'required', 'message' => 'Пожалуйста, выберите спортсмена.'],
            [['discharge'], 'integer', 'message' => 'Разряд должен быть целым числом.'],
            [['discharge'], 'default', 'value' => null],
            [['discharge', 'id_kind_of_sport'], 'integer'],
            [['id_kind_of_sport'], 'default', 'value' => null],

            [['name', 'discharge', 'id_sports_club'], 'required'],
            [['discharge', 'id_sports_club'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'discharge' => 'Разряд спортсмена',
            'id_kind_of_sport' => 'Вид спорта',
            'id' => 'Спортсмены',
            'sport_count' => 'Количество видов спорта',
            'name' => 'Имя спортсмена',
            'id_sports_club' => 'Спортивный клуб',
        ];
    }
}
