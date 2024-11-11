<?php

namespace app\models;

use yii\db\ActiveRecord;

class StructureChars extends ActiveRecord
{
    public static function tableName()
    {
        return 'structure_chars';
    }

    public function getStructure()
    {
        return $this->hasOne(Structure::class, ['id' => 'id_structure']);
    }
}