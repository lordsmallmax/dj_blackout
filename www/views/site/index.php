<?php

use yii\helpers\Html;

$this->title = 'DJ Blackout – Home';

$this->registerCss("
    body {
        background-color: #0a0a0a;
        color: #eee;
        font-family: 'Segoe UI', sans-serif;
    }

    .hero {
        text-align: center;
        padding: 100px 20px 60px 20px;
        background: radial-gradient(circle at center, #1a1a1a, #0a0a0a);
    }

    .hero h1 {
        font-size: 3.2rem;
        color: #e040fb;
        text-shadow: 0 0 15px #7c4dff;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 1.3rem;
        color: #ccc;
        max-width: 600px;
        margin: 0 auto 30px auto;
        line-height: 1.6;
    }

    .cta-btn {
        background: linear-gradient(45deg, #e040fb, #7c4dff);
        border: none;
        padding: 15px 35px;
        font-size: 1.2rem;
        color: white;
        border-radius: 40px;
        box-shadow: 0 0 12px #7c4dff;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .cta-btn:hover {
        background: linear-gradient(45deg, #f06292, #651fff);
        box-shadow: 0 0 20px #ab47bc;
    }

    .features {
        margin-top: 80px;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 40px;
        text-align: center;
    }

    .feature-box {
        background: #181818;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(124, 77, 255, 0.2);
        width: 280px;
    }

    .feature-box h3 {
        color: #ba68c8;
        margin-bottom: 10px;
    }

    .feature-box p {
        color: #bbb;
        font-size: 0.95rem;
        line-height: 1.4;
    }
");
?>

<div class="hero">
    <h1>Willkommen bei DJ Blackout</h1>
    <p>
        Deine Plattform für Clubsound, Community und Kontrolle.  
        Hier bestimmst du mit, was auf den Dancefloor kommt.
    </p>
    <?= Html::a('Jetzt starten', ['site/signup'], ['class' => 'cta-btn']) ?>
</div>

<div class="features container">
    <div class="feature-box">
        <h3>🔊 Vorschläge abgeben</h3>
        <p>Registrierte Gäste können Titel einreichen – von Clubklassikern bis Underground Hits.</p>
    </div>
    <div class="feature-box">
        <h3>📊 Voten & filtern</h3>
        <p>Welche Tracks heizen am meisten? Stimme ab und bring deine Vibes auf die Setlist.</p>
    </div>
    <div class="feature-box">
        <h3>🎧 Live-Erlebnis</h3>
        <p>Jeder Abend ist einzigartig – mit Community-getriebenen Playlists und Überraschungen.</p>
    </div>
</div>