<?php

namespace app\models;

use yii\db\ActiveRecord;

class Competitions extends ActiveRecord
{
    public static function tableName()
    {
        return 'competitions';
    }

    public function getOrganisationsCompetitions()
    {
        return $this->hasMany(OrganisationsCompetitions::class, ['id_competitions' => 'id']);
    }

    public function getSportsmanPrizewinner()
    {
        return $this->hasMany(SportsmanPrizewinner::class, ['id_competitions' => 'id']);
    }

    public function getStructure()
    {
        return $this->hasOne(Structure::class, ['id' => 'id_structure']);
    }

    public function getKindOfSport()
    {
        return $this->hasOne(KindOfSport::class, ['id' => 'id_kind_of_sport']);
    }

    public function getSportsmanCompetitions()
    {
        return $this->hasMany(SportsmanCompetitions::class, ['id_competitions' => 'id']);
    }

    // Правила валидации
    public function rules()
    {
        return [
            [['id_structure', 'id_kind_of_sport'], 'safe'],
            [['id_structure', 'id_kind_of_sport'], 'integer'],
            [['name', 'event_date', 'id_structure', 'id_kind_of_sport'], 'required'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'event_date' => 'Дата проведения',
            'id_structure' => 'Структура',
            'id_kind_of_sport' => 'Вид спорта',
        ];
    }
}
