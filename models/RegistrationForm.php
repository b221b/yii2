<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegistrationForm is the model behind the registration form.
 */
class RegistrationForm extends Model
{
    public $username;
    public $password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'This username has already been taken.'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->setPassword($this->password); // Убедитесь, что используется правильное поле

            if ($user->save()) {
                return $user;
            } else {
                // Логируем ошибки, если не удалось сохранить
                Yii::error($user->errors, __METHOD__);
            }
        }

        return null;
    }
}
