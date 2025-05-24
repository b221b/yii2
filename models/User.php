<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;
    const ROLE_MANAGER = 3;

    public static function tableName()
    {
        return 'user';
    }

    public function getUserInfo()
    {
        return $this->hasMany(UserInfo::class, ['id_user' => 'id']);
    }

    public function getEmail()
    {
        return $this->userInfo ? $this->userInfo->email : null;
    }

    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {}

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password', 'authKey'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['status_id'], 'integer'],
            [['status_id'], 'default', 'value' => self::ROLE_USER],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'status_id' => 'Статус пользователя',
            'authKey' => 'Ключ авторизации',
        ];
    }

    // Методы для проверки ролей
    public function isAdmin()
    {
        return $this->status_id === self::ROLE_ADMIN;
    }

    public function isUser()
    {
        return $this->status_id === self::ROLE_USER;
    }

    public function isManager()
    {
        return $this->status_id === self::ROLE_MANAGER;
    }

    public function getStatusLabel()
    {
        $statuses = [
            self::ROLE_ADMIN => 'Администратор',
            self::ROLE_USER => 'Пользователь',
            self::ROLE_MANAGER => 'Менеджер'
        ];
        return $statuses[$this->status_id] ?? 'Неизвестный статус';
    }

    public static function getStatusOptions()
    {
        return [
            self::ROLE_ADMIN => 'Администратор',
            self::ROLE_USER => 'Пользователь',
            self::ROLE_MANAGER => 'Менеджер'
        ];
    }

    const SCENARIO_PASSWORD_RESET = 'passwordReset';
    const STATUS_ACTIVE = 10;

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'] ?? 3600;

        return $timestamp + $expire >= time();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
        ]);
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
