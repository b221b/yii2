<?php

use yii\db\Migration;

/**
 * Class m241127_184825_rendom_migrate
 */
class m241127_184825_rendom_migrate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Создание записи в таблице user
        $this->insert('user', [
            'username' => 'randomMigrate',
            'password' => Yii::$app->security->generatePasswordHash('12345'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаление записи из таблицы user
        $this->delete('user', ['username' => 'randomMigrate']);

        echo "m241127_184825_rendom_migrate reverted.\n";
        return true;
    }

}
