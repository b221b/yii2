<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $password_hash;

    public static function tableName()
    {
        return 'user';
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

    // public function actionGenerateHash()
    // {
    //     $hash = Yii::$app->getSecurity()->generatePasswordHash('12345');
    //     echo $hash;
    // }

    public function actionGenerateAuthKey()
    {
        // Генерация случайной строки (authKey)
        $authKey = Yii::$app->security->generateRandomString();
        echo $authKey;
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['isAdmin', 'default', 'value' => 0],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'isAdmin' => 'Статус',
        ];
    }
}
