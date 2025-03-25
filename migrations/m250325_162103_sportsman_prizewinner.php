<?php

use yii\db\Migration;

/**
 * Class m250325_162103_sportsman_prizewinner
 */
class m250325_162103_sportsman_prizewinner extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sportsman_prizewinner', [
            'id' => $this->primaryKey(),
            'id_competition' => $this->integer()->notNull(),
            'id_sportsman' => $this->integer()->notNull(),
            'id_prizewinner' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sportsman_prizewinner');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250325_162103_sportsman_prizewinner cannot be reverted.\n";

        return false;
    }
    */
}
