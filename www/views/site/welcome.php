<?php
$this->title = 'Welcome – DJ Blackout';
?>

<style>
    body {
        background-color: #0a0a0a;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        color: #f0f0f0;
        text-align: center;
    }

    .blackout-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .blackout-logo {
        max-width: 350px;
        max-height: 150px;
        height: auto;
        width: auto;
        margin-bottom: 40px;
}

    h1 {
        font-size: 2.5em;
        color: #d633ff;
        margin-bottom: 20px;
    }

    p {
        font-size: 1.2em;
        color: #bbbbbb;
        margin-bottom: 40px;
    }

    .btn-start {
        background-color: #ff00aa;
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 30px;
        font-size: 1.1em;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .btn-start:hover {
        background-color: #e60095;
    }
</style>

<div class="blackout-container">
    <img src="/images/blackout-logo.png" alt="DJ Blackout Logo" class="blackout-logo">
    <h1>Willkommen bei DJ Blackout</h1>
    <p>Der Beat wartet nicht. Du auch nicht.</p>
    <a href="<?= \yii\helpers\Url::to(['site/login']) ?>" class="btn-start">Let’s Drop the Beat 🎧</a>
</div>

