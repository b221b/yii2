<?php

use yii\db\cubrid\Schema;
use yii\db\Migration;

/**
 * Class m250325_160911_sportsman_trainers
 */
class m250325_160911_sportsman_trainers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sportsman_trainers', [
            'id' => Schema::TYPE_INTEGER . ' NOT NULL PRIMARY KEY',
            'id_sportsman' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_trainers' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sportsman_trainers');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250325_160911_sportsman_trainers cannot be reverted.\n";

        return false;
    }
    */
}
