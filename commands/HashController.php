<?php

namespace app\commands;

use yii\console\Controller;
use app\models\User;

class HashController extends Controller
{
    public function actionGenerate()
    {
        $user = new User();
        $user->actionGenerateHash();
    }

    public function actionKey()
    {
        $user = new User();
        $user->actionGenerateAuthKey();
    }
}
