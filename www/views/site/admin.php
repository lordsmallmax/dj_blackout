<?php

use yii\helpers\Html;

$this->title = 'Adminbereich';
$this->registerCss("
    .admin-container {
        max-width: 800px;
        margin: 100px auto;
        padding: 40px;
        background: #181818;
        color: white;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(124, 77, 255, 0.4);
        font-family: 'Segoe UI', sans-serif;
    }

    .admin-container h1 {
        color: #e040fb;
        text-shadow: none;
        text-align: center;
        margin-bottom: 30px;
    }

    .admin-container p {
        font-size: 1.1rem;
        color: #ccc;
    }
");
?>

<div class="admin-container">
    <h1>Adminbereich</h1>
    <p>Willkommen, <?= Html::encode(Yii::$app->user->identity->username) ?> 👑</p>
    <p>Hier kannst du in Zukunft:</p>
    <ul>
        <li>🎧 Trackvorschläge einsehen</li>
        <li>🧑‍💼 Nutzer verwalten</li>
        <li>📅 Events konfigurieren</li>
        <li>🔐 Adminrechte vergeben</li>
    </ul>
    <p>Dieser Bereich ist nur für Admins sichtbar. ✨</p>
</div>