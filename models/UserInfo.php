<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class UserInfo extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;

    public static function tableName()
    {
        return 'user_info';
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    public function getTrainer()
    {
        return $this->hasOne(Trainers::class, ['id' => 'id_trainers']);
    }

    public function getSportsClub()
    {
        return $this->hasOne(SportsClub::class, ['id' => 'id_sports_club']);
    }

    public function getKindOfSport()
    {
        return $this->hasOne(KindOfSport::class, ['id' => 'id_kind_of_sport']);
    }

    public function rules()
    {
        return [
            [['id_user'], 'required', 'message' => 'Необходимо выбрать пользователя'],
            [['id_sports_club', 'id_trainers', 'id_user', 'gender', 'status', 'id_kind_of_sport'], 'integer'],
            [['id_user'], 'exist', 'targetClass' => User::className(), 'targetAttribute' => 'id'],
            [['birthday'], 'date', 'format' => 'php:Y-m-d'],

            ['status', 'default', 'value' => 0],

            [['email'], 'email'],
            
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],

            ['phone_number', 'unique', 'message' => 'Этот номер телефона уже используется'],
            ['email', 'unique', 'message' => 'Этот email уже используется'],

            [['phone_number'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 255],

            // Добавленные поля
            [['birthday', 'gender', 'id_sports_club', 'id_trainers', 'id_kind_of_sport'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone_number' => 'Номер телефона',
            'email' => 'Почта',
            'birthday' => 'Дата рождения',
            'gender' => 'Пол',
            'id_user' => 'Пользователь',
            'status' => 'Статус лицензии',
            'id_sports_club' => 'Спортивный клуб',
            'id_trainers' => 'Тренер',
            'id_kind_of_sport' => 'Вид спорта',
        ];
    }
}
