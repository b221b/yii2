<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%competition_applications}}`.
 */
class m250521_142709_create_competition_applications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('competition_applications', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'competition_id' => $this->integer()->notNull(),
            'status' => $this->string()->notNull()->defaultValue('pending'),
            'created_at' => $this->dateTime()->notNull(),
            'processed_at' => $this->dateTime(),
            'processed_by' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-competition_applications-user_id',
            'competition_applications',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-competition_applications-competition_id',
            'competition_applications',
            'competition_id',
            'competitions',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-competition_applications-processed_by',
            'competition_applications',
            'processed_by',
            'user',
            'id',
            'SET NULL'
        );
    }

    public function safeDown()
    {
        $this->dropTable('competition_applications');
    }
}
