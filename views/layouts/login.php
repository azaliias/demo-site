<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use yii\helpers\Url;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <?= $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/ico', 'href' => Url::to(['/images/favicon-backend.ico'])]); ?>
    <?= Html::csrfMetaTags() ?>
    <!-- Title -->
    <title><?= Yii::t('app', 'Admin panel') . ' - ' . Yii::$app->name; ?></title>
    <?php $this->head() ?>
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<?php $this->beginBody() ?>
    <div class="login-header">
        <div class="container-fluid">
            <div class="logo">
                <a href="<?= Url::to(['/admin-login']); ?>">
                    <?php echo Yii::$app->name; ?>
                </a>
            </div>
            <div class="login-title">
                <?php echo Yii::t('app', 'Login to admin panel'); ?>
            </div>
        </div>
    </div>
    <div class="login-form">
        <?php echo $content; ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
