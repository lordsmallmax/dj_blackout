<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\SongRequest $model */

$this->title = 'Musikwunsch einreichen';
?>
<div class="site-song-request">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Wünsch dir was! 🎶</p>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Optional']) ?>
    <?= $form->field($model, 'song_title')->textInput(['placeholder' => 'Songtitel'])->label('Songtitel *') ?>
    <?= $form->field($model, 'artist')->textInput(['placeholder' => 'Optional']) ?>
    <?= $form->field($model, 'genre')->textInput(['placeholder' => 'Optional']) ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => 4, 'placeholder' => 'Widmung, Stimmung, etc.']) ?>

    <div class="form-group">
        <?= Html::submitButton('Absenden', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>