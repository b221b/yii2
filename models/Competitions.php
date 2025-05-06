<?php

namespace app\models;

use yii\db\ActiveRecord;

class Competitions extends ActiveRecord
{
    const CACHE_DURATION = 1800; // 30 минут

    public static function tableName()
    {
        return 'competitions';
    }

    /**
     * Получает закешированные данные соревнований
     */
    public static function getCachedCompetitions()
    {
        $cache = \Yii::$app->cache;
        $cacheKey = 'competitions_data_' . date('Y-m-d'); // Ключ кеша

        $data = $cache->get($cacheKey);

        if ($data === false) {
            // Если данных нет в кеше, получаем из БД
            $data = self::find()
                ->with(['structure', 'kindOfSport', 'sportsmanPrizewinner.sportsman'])
                ->orderBy('name')
                ->all();

            // Сохраняем в кеш
            $cache->set($cacheKey, $data, self::CACHE_DURATION);
        }

        return $data;
    }

    /**
     * Очищает кеш соревнований
     */
    public static function clearCompetitionsCache()
    {
        $cacheKey = 'competitions_data_' . date('Y-m-d');
        \Yii::$app->cache->delete($cacheKey);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        self::clearCompetitionsCache(); // Очищаем кеш при сохранении
    }

    public function afterDelete()
    {
        parent::afterDelete();
        self::clearCompetitionsCache(); // Очищаем кеш при удалении
    }

    public function getOrganisationsCompetitions()
    {
        return $this->hasMany(OrganisationsCompetitions::class, ['id_competitions' => 'id']);
    }

    public function getSportsmanPrizewinner()
    {
        return $this->hasMany(SportsmanPrizewinner::class, ['id_competitions' => 'id']);
    }

    public function getStructure()
    {
        return $this->hasOne(Structure::class, ['id' => 'id_structure']);
    }

    public function getKindOfSport()
    {
        return $this->hasOne(KindOfSport::class, ['id' => 'id_kind_of_sport']);
    }

    public function getSportsmanCompetitions()
    {
        return $this->hasMany(SportsmanCompetitions::class, ['id_competitions' => 'id']);
    }

    // Правила валидации
    public function rules()
    {
        return [
            [['id_structure', 'id_kind_of_sport'], 'safe'],
            [['id_structure', 'id_kind_of_sport'], 'integer'],
            [['name', 'event_date', 'id_structure', 'id_kind_of_sport'], 'required'],

            [['description'], 'safe'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'event_date' => 'Дата проведения',
            'id_structure' => 'Структура',
            'id_kind_of_sport' => 'Вид спорта',
        ];
    }
}
