<?php

namespace app\models;

use yii\base\Model;
use app\models\User;

class ResetPasswordForm extends Model
{
    public $password;
    public $password_repeat;
    public $token;

    public function rules()
    {
        return [
            [['password', 'password_repeat'], 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => 'Новый пароль',
            'password_repeat' => 'Повторите пароль',
        ];
    }

    public function resetPassword()
    {
        $user = User::findByPasswordResetToken($this->token);
        if (!$user) {
            $this->addError('token', 'Неверный токен сброса пароля.');
            return false;
        }

        $user->setPassword($this->password);
        $user->password_reset_token = null;

        return $user->save(false);
    }
}
