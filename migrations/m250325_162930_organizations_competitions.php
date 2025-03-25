<?php

use yii\db\Migration;

/**
 * Class m250325_162930_organizations_competitions
 */
class m250325_162930_organizations_competitions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('organizations_competitions', [
            'id' => $this->primaryKey(),
            'id_organizations' => $this->integer()->notNull(),
            'id_competitions' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('organizations_competitions');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250325_162930_organizations_competitions cannot be reverted.\n";

        return false;
    }
    */
}
