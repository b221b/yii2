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
}
