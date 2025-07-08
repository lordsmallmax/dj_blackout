<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Admin-Zugang bestätigen';
$this->registerCss("
    .confirm-container {
        max-width: 400px;
        margin: 100px auto;
        background: #181818;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(124, 77, 255, 0.3);
        color: white;
        font-family: 'Segoe UI', sans-serif;
    }

    .confirm-container h1 {
        color: #e040fb;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-control {
        background-color: #2b2b2b;
        color: white;
    }

    .btn-dj {
        background: linear-gradient(45deg, #e040fb, #7c4dff);
        color: white;
        border-radius: 30px;
        border: none;
        padding: 10px 20px;
        width: 100%;
        margin-top: 20px;
    }
");
?>

<div class="confirm-container">
    <h1><?= Html::encode($this->title) ?></h1>
    <p style="text-align:center;">Bitte bestätige dein Admin-Passwort</p>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'username')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= Html::submitButton('Bestätigen & Fortfahren', ['class' => 'btn btn-dj']) ?>
    <?php ActiveForm::end(); ?>
</div>