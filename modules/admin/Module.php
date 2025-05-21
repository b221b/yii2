<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // Только авторизованные пользователи
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->status_id == \app\models\User::ROLE_ADMIN; // Только isadmin = 1
                        },
                        'denyCallback' => function ($rule, $action) {
                            throw new NotFoundHttpException('Страница не найдена.'); // 404 для isadmin = 0
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
