<?php

namespace app\models;

use yii\db\ActiveRecord;

class Org extends ActiveRecord
{
    public static function tableName()
    {
        return 'org';
    }

    public function getOrgSorevnovaniyas()
    {
        return $this->hasMany(OrgSorevnovaniya::class, ['id_org' => 'id']);
    }

    public function rules()
    {
        return [
            [['fio'], 'required'],
            [['fio'], 'string', 'max' => 255], 
        ];
    }

    public function attributeLabels()
    {
        return [
            'fio' => 'Название',
        ];
    }
}