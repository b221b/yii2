<?php

namespace app\models;

use yii\db\ActiveRecord;

class CompetitionNews extends ActiveRecord
{
    public static function tableName()
    {
        return 'competitions';
    }

    public function getStructure()
    {
        return $this->hasOne(Structure::className(), ['id' => 'id_structure']);
    }

    public function getSport()
    {
        return $this->hasOne(KindOfSport::className(), ['id' => 'id_kind_of_sport']);
    }

    public function getOrganisations()
    {
        return $this->hasMany(Organisations::className(), ['id' => 'id_organisations'])
            ->viaTable('organisations_competitions', ['id_competitions' => 'id']);
    }

    public function getWinners()
    {
        return $this->hasMany(Sportsman::className(), ['id' => 'id_sportsman'])
            ->viaTable('sportsman_prizewinner', ['id_competitions' => 'id']);
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название события',
            'event_date' => 'Дата проведения',
            'description' => 'Описание',
        ];
    }
}
