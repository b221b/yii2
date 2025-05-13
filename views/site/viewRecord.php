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

$this->title = 'Просмотр записи: ' . $displayName;
$this->params['breadcrumbs'][] = ['label' => $displayName, 'url' => ['table-data', 'table' => $tableName]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="view-record">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card mb-4">
        <div class="card-header">
            <h5>Основная информация</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <?php foreach ($displayData as $item): ?>
                    <tr>
                        <th width="30%"><?= Html::encode($item['label']) ?></th>
                        <td><?= nl2br(Html::encode($item['value'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <?php foreach ($relatedData as $relation => $items): ?>
        <?php if (!empty($items)): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <h5><?= $tableNamesMap[$relation] ?? ucfirst($relation) ?></h5>
                </div>
                <div class="card-body">
                    <?php if (count($items) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <?php foreach (array_keys($items[0]) as $field): ?>
                                            <?php if (!in_array($field, ['id', 'created_at', 'updated_at'])): ?>
                                                <th><?= $columnLabels[$relation][$field] ?? $field ?></th>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $item): ?>
                                        <tr style="cursor: pointer;"
                                            onclick="window.location.href='<?= Url::to(['view-record', 'table' => $relation, 'id' => $item['id']]) ?>'">
                                            <?php foreach ($item as $field => $value): ?>
                                                <?php if (!in_array($field, ['id', 'created_at', 'updated_at'])): ?>
                                                    <td>
                                                        <?php if (strpos($field, 'id_') === 0 && $value !== null): ?>
                                                            <?php
                                                            $relatedTable = substr($field, 3);
                                                            $relatedName = Yii::$app->db->createCommand('SELECT name FROM ' . $relatedTable . ' WHERE id=:id')
                                                                ->bindValue(':id', $value)
                                                                ->queryScalar();
                                                            echo $value . ' (' . ($relatedName ?: 'неизвестно') . ')';
                                                            ?>
                                                        <?php else: ?>
                                                            <?= Html::encode($value) ?>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>Нет связанных записей</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="text-right mt-3">
        <?= Html::a('Назад', ['table-data', 'table' => $tableName], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
