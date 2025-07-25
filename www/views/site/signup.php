<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Registrieren';
$this->registerCss("
    body {
        background-color: #0a0a0a;
        color: #fff;
        font-family: 'Segoe UI', sans-serif;
    }

    .signup-container {
        max-width: 450px;
        margin: 100px auto;
        background: #1a1a1a;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(124, 77, 255, 0.5);
    }

    h1 {
        color: #e040fb;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 0 0 10px #ba68c8;
    }

    .form-control {
        background-color: #2b2b2b;
        color: #fff;
        border: 1px solid #555;
    }

    .form-control:focus {
        border-color: #e040fb;
        box-shadow: 0 0 8px #ba68c8;
    }

    .btn-dj {
        background: linear-gradient(45deg, #e040fb, #7c4dff);
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        color: white;
        border-radius: 30px;
        width: 100%;
        margin-top: 20px;
        box-shadow: 0 0 10px #7c4dff;
    }

    .btn-dj:hover {
        background: linear-gradient(45deg, #f06292, #651fff);
        box-shadow: 0 0 20px #ab47bc;
    }

    .hint-text {
        color: #888;
        font-size: 0.9em;
        text-align: center;
        margin-top: 15px;
    }
");
?>

<div class="signup-container">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= Html::submitButton('Registrieren', ['class' => 'btn btn-dj']) ?>

    <?php ActiveForm::end(); ?>

    <div class="hint-text">
        Schon registriert? <?= Html::a('Login', ['site/login'], ['style' => 'color: #ba68c8']) ?>
    </div>
</div>