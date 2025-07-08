<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use app\models\User;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['user-list'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // nur eingeloggte Nutzer
                    ],
                ],
            ],
        ];
    }

    public function actionUserList()
    {
        if (\Yii::$app->user->isGuest || !\Yii::$app->user->identity->isAdmin) {
            throw new ForbiddenHttpException('Zutritt nur für Admins erlaubt!');
        }

        $users = User::find()->all();
        return $this->render('user-list', ['users' => $users]);
    }

    public function actionMusicLists()
    {
    if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isAdmin) {
        throw new \yii\web\ForbiddenHttpException('Zugriff verweigert.');
    }

        return $this->render('music-lists');
    }

    public function actionSongRequests()
    {
    if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isAdmin) {
        throw new \yii\web\ForbiddenHttpException('Kein Zugriff');
    }

    $requests = \app\models\SongRequest::find()->orderBy(['created_at' => SORT_DESC])->all();

    return $this->render('song-requests', ['requests' => $requests]);
    }

}