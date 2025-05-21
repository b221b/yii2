<?php

namespace app\models;

use yii\db\ActiveRecord;

class Status extends ActiveRecord
{
    public static function tableName()
    {
        return 'status';
    }

    public function getUsers()
    {
        return $this->hasMany(User::class, ['status_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Статус',
        ];
    }

    public static function getStatusList()
    {
        return self::find()->select(['status', 'id'])->indexBy('id')->column();
    }
}
