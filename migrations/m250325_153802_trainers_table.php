<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m250325_153802_trainers_table
 */
class m250325_153802_trainers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('trainers', [
            'id' => Schema::TYPE_INTEGER . ' NOT NULL PRIMARY KEY',
            'name' => Schema::TYPE_STRING . " NOT NULL",
            'id_kind_of_sport' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('trainers');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250325_153802_trainers_table cannot be reverted.\n";

        return false;
    }
    */
}
