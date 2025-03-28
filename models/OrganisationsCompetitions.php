<?php

namespace app\models;

use yii\db\ActiveRecord;

class OrganisationsCompetitions extends ActiveRecord
{
    public static function tableName()
    {
        return 'organisations_competitions';
    }

    public function getOrganisations()
    {
        return $this->hasOne(Organisations::class, ['id' => 'id_organisations']);
    }

    public function getCompetitions()
    {
        return $this->hasOne(Competitions::class, ['id' => 'id_competitions']);
    }

    public function rules()
    {
        return [
            [['id_organisations', 'id_competitions'], 'required'],
            [['id_organisations', 'id_competitions'], 'integer'],
            [['id_organisations', 'id_competitions'], 'unique', 'targetAttribute' => ['id_organisations', 'id_competitions'], 'message' => 'Запись с такой организацией и соревнованием уже существует.'], // Добавлено правило уникальности
        ];
    }
    

    public function attributeLabels()
    {
        return [
            'id_organisations' => 'Название организации',
            'id_competitions' => 'Название соревнования',
        ];
    }
}
