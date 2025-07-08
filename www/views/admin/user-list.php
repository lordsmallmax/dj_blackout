<?php
use yii\helpers\Html;

$this->title = 'Benutzerübersicht';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Benutzerübersicht</h1>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Benutzername</th>
            <th>Email</th>
            <th>Erstellt am</th>
            <th>Rolle</th>
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