<?php

namespace app\models;

use yii\db\ActiveRecord;

class OrgSorevnovaniya extends ActiveRecord
{
    public static function tableName()
    {
        return 'org_sorevnovaniya';
    }

    public function getOrg()
    {
        return $this->hasOne(Org::class, ['id' => 'id_org']);
    }

    public function getSorevnovaniya()
    {
        return $this->hasOne(Sorevnovaniya::class, ['id' => 'id_sorevnovaniya']);
    }

    public function rules()
    {
        return [
            [['id_org', 'id_sorevnovaniya'], 'required'], // Убедитесь, что поля обязательны
            [['id_org', 'id_sorevnovaniya'], 'integer'],
            [['id_org', 'id_sorevnovaniya'], 'unique', 'targetAttribute' => ['id_org', 'id_sorevnovaniya'], 'message' => 'Запись с такой организацией и соревнованием уже существует.'], // Добавлено правило уникальности
        ];
    }
    

    public function attributeLabels()
    {
        return [
            'id_org' => 'Название организации',
            'id_sorevnovaniya' => 'Название соревнования',
        ];
    }
}
