<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Exception;

/**
 * RegistrationForm is the model behind the registration form.
 */
class RegistrationForm extends Model
{
    public $username;
    public $email;
    public $password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'Это имя пользователя уже занято.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'message' => 'Пароль должен содержать минимум 6 символов.'],
            ['email', 'email', 'message' => 'Пожалуйста, введите корректный email.'],
            ['email', 'unique', 'targetClass' => UserInfo::class, 'targetAttribute' => 'email', 'message' => 'Этот email уже используется.'],
        ];
    }

    /**
     * Регистрирует нового пользователя с email
     * @return User|null сохраненный пользователь или null, если сохранение не удалось
     */
    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $transaction = Yii::$app->db->beginTransaction();
        try {
            // Создаем пользователя
            $user = new User();
            $user->username = $this->username;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            if (!$user->save()) {
                throw new Exception('Не удалось сохранить пользователя: ' . print_r($user->errors, true));
            }

            // Создаем информацию о пользователе с email
            $userInfo = new UserInfo();
            $userInfo->id_user = $user->id;
            $userInfo->email = $this->email;

            if (!$userInfo->save()) {
                throw new Exception('Не удалось сохранить информацию о пользователе: ' . print_r($userInfo->errors, true));
            }

            $transaction->commit();
            return $user;
        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::error('Ошибка регистрации: ' . $e->getMessage(), __METHOD__);
            $this->addError('username', 'Произошла ошибка при регистрации. Пожалуйста, попробуйте позже.');
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }
}
