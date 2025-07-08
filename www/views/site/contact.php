<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Kontakt';
$this->registerCss("
    body {
        background-color: #0a0a0a;
        color: #fff;
        font-family: 'Segoe UI', sans-serif;
    }

    .contact-container {
        max-width: 600px;
        margin: 100px auto;
        background: #1a1a1a;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(124, 77, 255, 0.4);
    }

    h1 {
        color: #e040fb;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 0 0 12px #ba68c8;
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
        padding: 12px 25px;
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

    .form-text {
        font-size: 0.9em;
        color: #aaa;
        margin-top: 10px;
        text-align: center;
    }
");
?>

<div class="contact-container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p style="text-align: center; margin-bottom: 30px;">
        Fragen, Feedback oder Songwünsche? Schreib mir direkt!
    </p>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="alert alert-success text-center">
            Danke für deine Nachricht! Ich melde mich bald bei dir. 🎧
        </div>
    <?php else: ?>

        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'subject') ?>
            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                'captchaAction' => 'site/captcha',
                'options' => ['class' => 'form-control'],
                'template' => '<div class="row"><div class="col">{image}</div><div class="col">{input}</div></div>',
            ]) ?>

            <?= Html::submitButton('Abschicken', ['class' => 'btn btn-dj', 'name' => 'contact-button']) ?>

        <?php ActiveForm::end(); ?>

        <div class="form-text">
            Du kannst auch direkt an <strong>info@dj-blackout.de</strong> schreiben.
        </div>

    <?php endif; ?>
</div>