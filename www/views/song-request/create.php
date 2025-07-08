<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Musikwunsch einreichen';
?>

<div class="song-request-form">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Hier kannst du während des Events deine Musikwünsche einreichen.</p>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 4]) ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Wunsch abschicken', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>