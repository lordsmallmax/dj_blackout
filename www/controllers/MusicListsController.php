<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\MusicList;  // Singular
use yii\web\Response;

class SongRequestController extends Controller
{
    public function actionCreate()
    {
        $model = new MusicList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Vielen Dank für deinen Musikreintrag!');
            return $this->refresh();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}