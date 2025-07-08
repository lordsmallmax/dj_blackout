<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionWelcome()
    {
        return $this->render('welcome');
    }
    
     public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
            return $this->render('login', ['model' => $model,]);
    }

    public function actionSignup(){
        $model = new \app\models\SignupForm();
        if ($model->load(\Yii::$app->request->post()) && $user = $model->signup()) {
            Yii::$app->user->login($user); // <<< automatisch einloggen
            Yii::$app->session->setFlash('success', 'Registrierung erfolgreich. Willkommen bei DJ Blackout!');
            return $this->redirect(['site/welcome-user']);
        }     
        return $this->render('signup', ['model' => $model]);
    }

    public function actionWelcomeUser()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        return $this->render('welcome-user');
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', ['model' => $model]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAdmin(){
        if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isAdmin) {
        throw new \yii\web\ForbiddenHttpException('Du hast keinen Zugriff auf diese Seite.');
    }
        return $this->render('admin');
    }

    public function actionConfirmAdmin()
    {
        if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isAdmin) {
            throw new \yii\web\ForbiddenHttpException('Zugriff verweigert.');
        }

        $model = new \app\models\LoginForm();
        $model->username = Yii::$app->user->identity->username; // vorausgefüllt

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->login()) {
            return $this->redirect(['site/admin']);
        }

        return $this->render('confirm-admin', ['model' => $model]);
    }

    public function actionSongRequest() 
    {
        $model = new \app\models\song_request();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        Yii::$app->session->setFlash('success', 'Dein Wunsch wurde gespeichert!');
        return $this->refresh();
    }

        return $this->render('song-request', ['model' => $model]);
    }
}
