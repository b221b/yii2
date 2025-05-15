<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%competition_registration}}`.
 */
class m250514_181235_create_competition_registration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('competition_registration', [
            'id' => $this->primaryKey(),
            'competition_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'registration_date' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-registration-competition',
            'competition_registration',
            'competition_id',
            'competitions',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-registration-user',
            'competition_registration',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('competition_registration');
    }
}
