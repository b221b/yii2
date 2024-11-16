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
    
    public function rules()
    {
        return [
            [['id_structure'], 'required'],
            [['vmestimost', 'tip_pokritiya', 'kolvo_oborydovaniya', 'kolvo_tribun'], 'safe'],
            [['id_structure'], 'unique', 'targetAttribute' => 'id_structure', 'message' => 'Запись для этой структуры уже существует.'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id_structure' => 'Название структуры',
            'vmestimost' => 'Вместимость',
            'tip_pokritiya' => 'Тип покрытия',
            'kolvo_oborydovaniya' => 'Количество оборудования',
            'kolvo_tribun' => 'Количество Трибун',
        ];
    }
}
