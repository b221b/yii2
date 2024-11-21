<?php

namespace app\models;

use yii\db\ActiveRecord;

class Prizer extends ActiveRecord
{
    public static function tableName()
    {
        return 'prizer';
    }

    public function getSorevnovaniyas()
    {
        return $this->hasMany(Sorevnovaniya::class, ['id_prizer' => 'id']);
    }

    public function getSportsmenPrizers()
    {
        return $this->hasMany(SportsmenPrizer::class, ['id_prizer' => 'id']);
    }

    public function rules()
    {
        return [
            [['mesto', 'nagrada'], 'required'],
            [['mesto'], 'integer'],
            [['nagrada'], 'string', 'max' => 255], 
            [['mesto'], 'unique', 'targetAttribute' => ['mesto'], 'message' => 'Запись с таким призовым уже существует.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mesto' => 'Призовое место',
            'nagrada' => 'Награда',
        ];
    }
}
