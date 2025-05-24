<?php

namespace app\models;

use Yii;
use yii\base\Model;

class PasswordResetRequestForm extends Model
{
    public $email;

    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            [
                'email',
                'exist',
                'targetClass' => '\app\models\UserInfo',
                'targetAttribute' => 'email',
                'message' => 'Нет пользователя с таким email.'
            ],
        ];
    }

    public function sendEmail()
    {
        $userInfo = UserInfo::findOne(['email' => $this->email]);
        if (!$userInfo || !$userInfo->user) {
            return false;
        }

        $user = $userInfo->user;

        // Генерируем новый токен
        $user->generatePasswordResetToken();
        if (!$user->save()) {
            return false;
        }

        return Yii::$app->mailer
            ->compose(
                [
                    'html' => 'passwordResetToken-html',
                    'text' => 'passwordResetToken-text'
                ],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('Восстановление пароля для ' . Yii::$app->name)
            ->send();
    }
}
