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
}