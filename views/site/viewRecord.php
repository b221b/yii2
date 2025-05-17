<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $record array */
/* @var $tableName string */
/* @var $displayName string */
/* @var $displayData array */
/* @var $relatedData array */
/* @var $tableNamesMap array */

$this->title = 'Просмотр записи: ' . ($record['name'] ?? 'Запись #' . $record['id']);
$this->params['breadcrumbs'][] = ['label' => $tableNamesMap[$tableName] ?? $tableName, 'url' => ['table-data', 'table' => $tableName]];
$this->params['breadcrumbs'][] = $this->title;

// Получаем модель для текущей таблицы, чтобы использовать attributeLabels
$modelClass = 'app\models\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $tableName)));
$model = class_exists($modelClass) ? new $modelClass() : null;
?>

<div class="data-container">
    <div class="record-container">
        <div class="record-header">
            <h1 class="record-title"><?= Html::encode($record['name'] ?? 'Запись #' . $record['id']) ?></h1>
            <p class="record-subtitle"><?= $tableNamesMap[$tableName] ?? $tableName ?></p>
        </div>

        <div class="record-details">
            <?php foreach ($displayData as $item): ?>
                <?php
                // Пропускаем поле ID и пустые значения
                if ($item['label'] === 'id' || $item['value'] === null) continue;

                // Обрабатываем связанные поля (id_*)
                if (strpos($item['label'], 'id_') === 0) {
                    $relatedTable = substr($item['label'], 3);
                    $relatedName = Yii::$app->db->createCommand('SELECT name FROM ' . $relatedTable . ' WHERE id=:id')
                        ->bindValue(':id', $item['value'])
                        ->queryScalar();

                    // Получаем label из attributeLabels модели или используем название связанной таблицы
                    $newLabel = $model ? ($model->attributeLabels()[$item['label']] ??
                        (isset($tableNamesMap[$relatedTable]) ? $tableNamesMap[$relatedTable] : $item['label'])) : $item['label'];

                    // Отображаем только название связанной записи
                    $value = $relatedName ? Html::encode($relatedName) : 'неизвестно';
                } else {
                    // Для обычных полей используем attributeLabels или оригинальное название
                    $newLabel = $model ? ($model->attributeLabels()[$item['label']] ?? $item['label']) : $item['label'];
                    $value = nl2br(Html::encode($item['value']));
                }
                ?>
                <div class="detail-item">
                    <span class="detail-label"><?= Html::encode($newLabel) ?></span>
                    <div class="detail-value"><?= $value ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="record-actions">
            <a href="<?= Url::to(['table-data', 'table' => $tableName]) ?>" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Назад к списку
            </a>
        </div>
    </div>

    <?php foreach ($relatedData as $relation => $items): ?>
        <?php if (!empty($items)): ?>
            <?php
            // Получаем модель для связанной таблицы
            $relatedModelClass = 'app\models\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $relation)));
            $relatedModel = class_exists($relatedModelClass) ? new $relatedModelClass() : null;
            ?>

            <div class="related-section">
                <h2 class="section-title"><?= $tableNamesMap[$relation] ?? ucfirst($relation) ?></h2>

                <div class="related-cards">
                    <?php foreach ($items as $item): ?>
                        <div class="related-card clickable-card"
                            onclick="window.location.href='<?= Url::to(['view-record', 'table' => $relation, 'id' => $item['id']]) ?>'">
                            <h3 class="card-title"><?= Html::encode($item['name'] ?? 'Запись #' . $item['id']) ?></h3>

                            <div class="card-details">
                                <?php foreach ($item as $field => $value): ?>
                                    <?php
                                    // Пропускаем служебные поля и пустые значения
                                    if (in_array($field, ['id', 'created_at', 'updated_at', 'name']) || $value === null) continue;

                                    // Обрабатываем связанные поля (id_*)
                                    if (strpos($field, 'id_') === 0) {
                                        $relatedTable = substr($field, 3);
                                        $relatedName = Yii::$app->db->createCommand('SELECT name FROM ' . $relatedTable . ' WHERE id=:id')
                                            ->bindValue(':id', $value)
                                            ->queryScalar();

                                        // Получаем label из attributeLabels модели или используем название связанной таблицы
                                        $fieldLabel = $relatedModel ? ($relatedModel->attributeLabels()[$field] ??
                                            (isset($tableNamesMap[$relatedTable]) ? $tableNamesMap[$relatedTable] : $field)) : $field;

                                        $valueDisplay = $relatedName ? Html::encode($relatedName) : 'неизвестно';
                                    } else {
                                        // Для обычных полей используем attributeLabels или оригинальное название
                                        $fieldLabel = $relatedModel ? ($relatedModel->attributeLabels()[$field] ?? $field) : $field;
                                        $valueDisplay = Html::encode($value);
                                    }
                                    ?>
                                    <div class="card-detail">
                                        <span class="card-label"><?= $fieldLabel ?>:</span>
                                        <span class="card-value"><?= $valueDisplay ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>