<?php
use yii\helpers\Html;

/** @var app\models\MusicList[] $musicList */

$this->title = 'Meine Musikübersicht';
?>

<h1><?= Html::encode($this->title) ?></h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Songtitel</th>
            <th>Artist</th>
            <th>Event</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($musicList as $music): ?>
            <tr>
                <td><?= Html::encode($music->title) ?></td>
                <td><?= Html::encode($music->artist) ?></td>
                <td><?= Html::encode($music->event->name ?? 'Kein Event') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p>
    <?= Html::a('Neues Lied hinzufügen', ['site/add-music'], ['class' => 'btn btn-success']) ?>
</p>