<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class UserInfo extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_info';
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    public function rules()
    {
        return [
            [['id_user'], 'required', 'message' => 'Необходимо выбрать пользователя'],
            [['id_user'], 'integer'],
            [['id_user'], 'exist', 'targetClass' => User::className(), 'targetAttribute' => 'id'],

            ['status', 'default', 'value' => 0],

            [['email'], 'email'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],

            ['phone_number', 'unique', 'message' => 'Этот номер телефона уже используется'],
            ['email', 'unique', 'message' => 'Этот email уже используется'],

            [['phone_number'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone_number' => 'Номер телефона',
            'email' => 'Почта',
            'id_user' => 'Пользователь',
            'status' => 'Статус лицензии',
        ];
    }
}
