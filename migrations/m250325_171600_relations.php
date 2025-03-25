<?php

use yii\db\Migration;

/**
 * Class m250325_171600_relations
 */
class m250325_171600_relations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Связи для таблицы `sorevnovaniya`
        $this->addForeignKey(
            'fk_competitions_structure',
            'competitions',
            'id_structure',
            'structure',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_competitions_kind_of_sport',
            'competitions',
            'id_kind_of_sport',
            'kind_of_sport',
            'id',
            'CASCADE'
        );

        // Связи для таблицы `sportsman`
        $this->addForeignKey(
            'fk_sportsman_sports_club',
            'sportsman',
            'id_sports_club',
            'sports_club',
            'id',
            'CASCADE'
        );

        // Связи для таблицы `sportsman_prizeweinner`
        $this->addForeignKey(
            'fk_sportsman_prizeweinner_sportsman',
            'sportsman_prizewinner',
            'id_sportsman',
            'sportsman',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_sportsman_prizeweinner_prizeweinner',
            'sportsman_prizewinner',
            'id_prizewinner',
            'prizewinner',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_sportsman_prizeweinner_competitions',
            'sportsman_prizewinner',
            'id_competition',
            'competitions',
            'id',
            'CASCADE'
        );

        // Связи для таблицы `sportsman_competitions`
        $this->addForeignKey(
            'fk_sportsman_competitions_sportsman',
            'sportsman_competitions',
            'id_sportsman',
            'sportsman',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_sportsman_competitions_competitions',
            'sportsman_competitions',
            'id_competitions',
            'competitions',
            'id',
            'CASCADE'
        );

        // Связи для таблицы `sportsman_trainers`
        $this->addForeignKey(
            'fk_sportsman_trainers_sportsman',
            'sportsman_trainers',
            'id_sportsman',
            'sportsman',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_sportsmen_trainers_trainers',
            'sportsman_trainers',
            'id_trainers',
            'trainers',
            'id',
            'CASCADE'
        );

        // Связи для таблицы `sportsmen_vidSporta`
        $this->addForeignKey(
            'fk_sportsman_kind_of_sport_sportsman',
            'sportsman_kind_of_sport',
            'id_sportsman',
            'sportsman',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_sportsman_kind_of_sport_kind_of_sport',
            'sportsman_kind_of_sport',
            'id_kind_of_sport',
            'kind_of_sport',
            'id',
            'CASCADE'
        );

        // Связи для таблицы `organisations_competitions`
        $this->addForeignKey(
            'fk_organisations_competitions_organisations',
            'organisations_competitions',
            'id_organisations',
            'organisations',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_organisations_competitions_competitions',
            'organisations_competitions',
            'id_competitions',
            'competitions',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250325_171600_relations cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250325_171600_relations cannot be reverted.\n";

        return false;
    }
    */
}
