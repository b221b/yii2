<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m241114_083041_add_auth_key_and_access_token_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        // Добавляем столбцы authKey и accessToken
        $this->addColumn('{{%users}}', 'authKey', $this->string()->notNull()->defaultValue(''));
        // $this->addColumn('{{%users}}', 'accessToken', $this->string()->notNull()->defaultValue(''));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        // Удаляем столбцы authKey и accessToken
        $this->dropColumn('{{%users}}', 'authKey');
        // $this->dropColumn('{{%users}}', 'accessToken');
    }
}
