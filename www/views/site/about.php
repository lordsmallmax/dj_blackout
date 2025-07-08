<?php
use yii\helpers\Html;

$this->title = 'Über DJ Blackout';

$this->registerCss("
    body {
        background-color: #0a0a0a;
        color: #eee;
        font-family: 'Segoe UI', sans-serif;
    }

    .about-container {
        max-width: 800px;
        margin: 100px auto;
        background: #181818;
        padding: 50px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(124, 77, 255, 0.4);
    }

    h1 {
        color: #e040fb;
        text-shadow: 0 0 12px #ba68c8;
        text-align: center;
        margin-bottom: 30px;
    }

    p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #ccc;
        margin-bottom: 20px;
    }

    .highlight {
        color: #ba68c8;
        font-weight: bold;
    }
");
?>

<div class="about-container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <span class="highlight">DJ Blackout</span> ist mehr als nur ein Künstlername – es ist ein Versprechen.  
        Ein Versprechen für Energie, Tiefe und Eskalation auf dem Dancefloor.
    </p>

    <p>
        Ob Club, Open Air oder Privatevent:  
        <span class="highlight">Blackout</span> liefert kompromisslose Sets, maßgeschneidert auf die Crowd – 
        von treibenden Basslines bis zu epischen Melodien, die Gänsehaut bringen.
    </p>

    <p>
        Mit einem starken Fokus auf <span class="highlight">Community</span> wird jede Veranstaltung interaktiv:  
        Gäste können Songs vorschlagen, Vibes voten und die Musik mitgestalten.
    </p>

    <p>
        Technisch basiert das Projekt auf einem maßgeschneiderten System, gebaut mit ❤️ in PHP & Yii2 –  
        inklusive Loginbereich, User-Vorschlägen und einem DJ-Adminpanel für volle Kontrolle hinterm Pult.
    </p>

    <p>
        Bereit, Teil von <span class="highlight">DJ Blackout</span> zu werden?  
        Dann: Registrieren, Track vorschlagen, Lieblingssound voten – oder einfach mittanzen.  
        Denn bei uns gilt: <strong>Don’t fade out – go blackout.</strong>
    </p>
</div>