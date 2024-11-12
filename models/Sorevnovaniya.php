<?php

namespace app\models;

use yii\db\ActiveRecord;

class Sorevnovaniya extends ActiveRecord
{
    public static function tableName()
    {
        return 'sorevnovaniya';
    }

    public function getOrgSorevnovaniyas()
    {
        return $this->hasMany(OrgSorevnovaniya::class, ['id_sorevnovaniya' => 'id']);
    }

    // public function getPrizer()
    // {
    //     return $this->hasOne(Prizer::class, ['id' => 'id_prizer']);
    // }

    public function getSportsmenPrizers()
    {
        return $this->hasMany(SportsmenPrizer::class, ['id_sorevnovaniya' => 'id']);
    }

    public function getStructure()
    {
        return $this->hasOne(Structure::class, ['id' => 'id_structure']);
    }

    public function getVidSporta()
    {
        return $this->hasOne(VidSporta::class, ['id' => 'id_vid_sporta']);
    }

    public function getSportsmenSorevnovaniyas()
    {
        return $this->hasMany(SportsmenSorevnovaniya::class, ['id_sorevnovaniya' => 'id']);
    }

    // Правила валидации
    public function rules()
    {
        return [
            [['id_structure', 'id_vid_sporta'], 'safe'],
            [['id_structure', 'id_vid_sporta'], 'integer'],
            [['name', 'data_provedeniya', 'id_structure', 'id_vid_sporta', 'id_prizer'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_structure' => 'Структура',
            'id_vid_sporta' => 'Вид спорта',
        ];
    }
}
