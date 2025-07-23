<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'sizes' => '32x32', 'href' => '@web/favicon.png']);
$this->registerLinkTag(['rel' => 'apple-touch-icon', 'sizes' => '180x180', 'href' => '@web/apple-touch-icon.png']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
$this->registerCss("
    .navbar-nav .text-warning {
        color:rgb(248, 244, 248) !important;
        font-weight: bold;
        text-shadow: none;
    }
");
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/blackout-logo.png', [
            'alt' => 'DJ Blackout Logo',
            'style' => 'height:32px; margin-right:10px;'
        ]) . '<span class="navbar-title">DJ Blackout</span>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar navbar-expand-md navbar-dark blackout-navbar fixed-top']
    ]);

    $userEvents = [];
        if (!Yii::$app->user->isGuest) {
            $userEvents = \app\models\Event::find()
            ->where(['user_id' => Yii::$app->user->id, 'is_active' => 1])
            ->orderBy(['date' => SORT_DESC])
            ->all();
        }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => array_merge(
            [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
                ['label' => 'Events', 'url' => ['/site/events']],
                ['label' => 'Song Requests',
                    'items' => array_map(function ($event) {
                        return [
                        'label' => $event->name,
                        'url' => ['/site/song-request', 'slug' => $event->slug],
                        ];
                    }, $userEvents)],
                ['label' => 'Musikübersicht', 'url' => ['/site/my-music-list']],
            ],
            Yii::$app->user->isGuest ? 
                 [
                    ['label' => 'Login', 'url' => ['/site/login']],
                    ['label' => 'Register', 'url' => ['/site/signup']],
                ]
                : array_merge(
                    Yii::$app->user->identity->isAdmin ? [[
                        'label' => 'Admin Portal',
                        'url' => ['/site/confirm-admin'],
                        'linkOptions' => ['class' => 'text-warning']
                    ], [
                        'label' => 'Benutzerverwaltung',
                        'url' => ['/admin/user-list'],
                        'linkOptions' => ['class' => 'text-warning']
                    ],[
                        'label' => 'Musiklisten',
                        'url' => ['/admin/music-lists'],
                        'linkOptions' => ['class' => 'text-warning']
                    ],[
                        'label' => 'Song Requests',
                        'url' => ['/admin/song-requests'],
                        'linkOptions' => ['class' => 'text-warning']
                    ]] : [],
                    [['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']
                    ]]
                )
        )       
    ]);

    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; DJ Blackout GmbH <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
