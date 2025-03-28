<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Запрос: Тренеры для спортсмена';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="sportsmen-treners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->dropDownList(
        \yii\helpers\ArrayHelper::map($sportsmenList, 'id', 'name'),
        ['prompt' => 'Выберите спортсмена']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Показать тренеров', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Показать всех спортсменов', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<h2>Тренеры для выбранного спортсмена:</h2>

<?php if ($trenersDataProvider && count($trenersDataProvider->models) > 0): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Имя спортсмена</th>
                <th>Имена тренеров</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trenersDataProvider->models as $trener): ?>
                <tr>
                    <td><?= Html::encode($trener['sportsman_name']) ?></td>
                    <td><?= Html::encode($trener['treners_names']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Тренеры не найдены для выбранного спортсмена.</p>
<?php endif; ?>