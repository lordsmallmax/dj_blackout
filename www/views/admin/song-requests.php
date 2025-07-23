<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SongRequest[] $requests */

$this->title = 'Musikwünsche';
?>
<h1><?= Html::encode($this->title) ?></h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Zeit</th>
            <th>Name</th>
            <th>Song</th>
            <th>Artist</th>
            <th>Genre</th>
            <th>Kommentar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requests as $req): ?>
            <tr>
                <td><?= Html::encode($req->created_at) ?></td>
                <td><?= Html::encode($req->name) ?></td>
                <td><?= Html::encode($req->title) ?></td>
                <td><?= Html::encode($req->artist) ?></td>
                <td><?= Html::encode($req->genre) ?></td>
                <td><?= Html::encode($req->comment) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>