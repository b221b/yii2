<?php

namespace app\models;

use yii\db\ActiveRecord;

class Structure extends ActiveRecord
{
    public static function tableName()
    {
        return 'structure';
    }

    public function getCompetitions()
    {
        return $this->hasMany(Competitions::class, ['id_structure' => 'id']);
    }

    // не созданная таблица StructureChars
    // public function getStructureChars()
    // {
    //     return $this->hasMany(StructureChars::class, ['id_structure' => 'id']);
    // }

    public static function getList()
    {
        return self::find()->select(['name', 'id'])->indexBy('id')->column();
    }

    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name'], 'string', 'max' => 255], 
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'type' => 'Тип',
        ];
    }
}