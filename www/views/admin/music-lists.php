<?php
use yii\helpers\Html;
/** @var app\models\User[] $users */

$this->title = 'Musikübersicht';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Musikübersicht</h1>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Titel</th>
            <th>Artist</th>
            <th>Genre</th>
            <th>Spiellänge</th>
            <th>Sprache</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= Html::encode($user->id) ?></td>
                <td><?= Html::encode($user->username) ?></td>
                <td><?= Html::encode($user->email) ?></td>
                <td><?= Html::encode($user->created_at) ?></td>
                <td><?= $user->isAdmin ? 'Admin' : 'User' ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>