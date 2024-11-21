<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportsmenSorevnovaniya extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsmen_sorevnovaniya';
    }

    public function getSportsmen()
    {
        return $this->hasOne(Sportsmen::class, ['id' => 'id_sportsmen']);
    }

    public function getSorevnovaniya()
    {
        return $this->hasOne(Sorevnovaniya::class, ['id' => 'id_sorevnovaniya']);
    }

    public function rules()
    {
        return [
            [['id_sportsmen', 'id_sorevnovaniya'], 'required'], 
            [['id_sportsmen', 'id_sorevnovaniya'], 'integer'],
            [['id_sportsmen', 'id_sorevnovaniya'], 'unique', 'targetAttribute' => ['id_sportsmen', 'id_sorevnovaniya'], 'message' => 'Запись с таким спортсменом и соревнованием уже существует.'], 
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id_sportsmen' => 'Спортсмен',
            'id_sorevnovaniya' => 'Название соревнования',
        ];
    }
}
