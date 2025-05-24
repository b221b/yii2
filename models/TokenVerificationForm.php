<?php

namespace app\models;

use yii\base\Model;
use app\models\User;

class TokenVerificationForm extends Model
{
    public $token;

    public function rules()
    {
        return [
            ['token', 'required'],
            ['token', 'string'],
            ['token', 'validateToken'],
        ];
    }

    public function validateToken($attribute, $params)
    {
        if (!User::isPasswordResetTokenValid($this->$attribute)) {
            $this->addError($attribute, 'Неверный или устаревший токен.');
            return false;
        }

        $user = User::findByPasswordResetToken($this->$attribute);
        if (!$user) {
            $this->addError($attribute, 'Пользователь с таким токеном не найден.');
        }
    }
}
