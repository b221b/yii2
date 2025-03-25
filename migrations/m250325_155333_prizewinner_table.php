<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m250325_155333_prizewinner_table
 */
class m250325_155333_prizewinner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('prizewinner', [
            'id' => Schema::TYPE_INTEGER . ' NOT NULL PRIMARY KEY',
            'prize_place' => Schema::TYPE_INTEGER . " NOT NULL",
            'reward' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('prizewinner');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250325_155333_prizewinner_table cannot be reverted.\n";

        return false;
    }
    */
}
