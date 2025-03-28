<?php

namespace app\models;

use yii\db\ActiveRecord;

class Organisations extends ActiveRecord
{
    public static function tableName()
    {
        return 'organisations';
    }

    public function getOrganisationsCompetitions()
    {
        return $this->hasMany(OrganisationsCompetitions::class, ['id_organisations' => 'id']);
    }

    public function rules()
    {
        return [
            [['full_name'], 'required'],
            [['full_name'], 'string', 'max' => 255], 
        ];
    }

    public function attributeLabels()
    {
        return [
            'full_name' => 'Название',
        ];
    }
}