<?php
use yii\helpers\Html;

$this->title = 'Willkommen bei DJ Blackout';

$this->registerCss("
    body {
        background-color: #0d0d0d;
        color: #eee;
        font-family: 'Segoe UI', sans-serif;
    }

    .welcome-container {
        max-width: 600px;
        margin: 100px auto;
        padding: 40px;
        background: #181818;
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(124, 77, 255, 0.3);
        text-align: center;
    }

    .welcome-container h1 {
        font-size: 2.8rem;
        color: #e0aaff;
        margin-bottom: 20px;
    }

    .welcome-container p {
        font-size: 1.2rem;
        color: #ccc;
        margin-top: 10px;
        line-height: 1.6;
    }

    .welcome-btn {
        display: inline-block;
        margin-top: 30px;
        padding: 12px 30px;
        background: linear-gradient(45deg, #7c4dff, #ba68c8);
        color: white;
        text-decoration: none;
        font-weight: 600;
        border-radius: 30px;
        box-shadow: 0 0 8px rgba(186, 104, 200, 0.4);
        transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    .welcome-btn:hover {
        background: linear-gradient(45deg, #9c27b0, #651fff);
        box-shadow: 0 0 16px rgba(124, 77, 255, 0.5);
    }
");
?>

<div class="welcome-container">
    <h1>Willkommen, <?= Html::encode(Yii::$app->user->identity->username) ?>!</h1>

    <p>Du bist nun Teil der DJ Blackout Community.<br>
       Hier dreht sich alles um deinen Sound, deine Vibes und deine Crowd.</p>

    <p style="margin-top:30px; font-style: italic; color: #aaa;">
        „Musik ist die stärkste Form von Magie.“ – Marilyn Manson
    </p>

    <a href="<?= Yii::$app->homeUrl ?>" class="welcome-btn">
        Klicke hier, um zur Homepage zurückzukehren und deine musikalische Reise zu beginnen!
    </a>
</div>