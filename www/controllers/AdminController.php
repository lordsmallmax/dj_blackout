<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use app\models\User;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Font\NotoSans;

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

        $users = \app\models\User::find()->all();
        return $this->render('music-lists', [
            'users' => $users
        ]);
    }

    public function actionSongRequests()
    {
    if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isAdmin) {
        throw new \yii\web\ForbiddenHttpException('Kein Zugriff');
    }

    $requests = \app\models\SongRequest::find()->orderBy(['created_at' => SORT_DESC])->all();

    return $this->render('song-requests', ['requests' => $requests]);
    }

    public function actionQrCode($eventId)
    {
        $event = Event::findOne($eventId);
        if (!$event) {
            throw new \yii\web\NotFoundHttpException('Event nicht gefunden.');
        }
    $url = Yii::$app->urlManager->createAbsoluteUrl(['site/song-request', 'slug' => $event->slug]);

    $result = Builder::create()
        ->data($url)
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
        ->size(300)
        ->margin(10)
        ->labelText($event->name)
        ->labelFont(new NotoSans(20))
        ->build();

    // Direkt als PNG anzeigen
    Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
    Yii::$app->response->headers->add('Content-Type', 'image/png');
    return $result->getString();
    } 
}