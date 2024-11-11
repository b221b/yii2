<?php

namespace app\models;

use yii\db\ActiveRecord;

class Structure extends ActiveRecord
{
    public static function tableName()
    {
        return 'structure';
    }

    public function getSorevnovaniyas()
    {
        return $this->hasMany(Sorevnovaniya::class, ['id_structure' => 'id']);
    }

    public function getStructureChars()
    {
        return $this->hasMany(StructureChars::class, ['id_structure' => 'id']);
    }

    // Новый метод для получения списка структур
    public static function getList()
    {
        return self::find()->select(['name', 'id'])->indexBy('id')->column();
    }
}