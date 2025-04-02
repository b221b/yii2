<?php

use yii\db\Migration;

/**
 * Class m250402_090138_user_info
 */
class m250402_090138_user_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_info', [
            'id' => $this->primaryKey(),
            'phone_number' => $this->string(20),
            'email' => $this->string(255),
            'id_user' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk_user_info_user',
            'user_info',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_info_user', 'user_info');

        $this->dropTable('user_info');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250402_090138_user_info cannot be reverted.\n";

        return false;
    }
    */
}
