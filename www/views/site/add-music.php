<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var app\models\MusicList $model */
/** @var array $eventItems */

$this->title = 'Neuen Song hinzufügen';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'artist')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'event_id')->dropDownList($eventItems, ['prompt' => 'Wähle ein Event aus']) ?>

<div class="form-group">
    <?= Html::submitButton('Hinzufügen', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>