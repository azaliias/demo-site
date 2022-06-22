<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

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
    <?=$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/ico', 'href' => Url::to(['/images/favicon-backend.ico'])]); ?>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) . ' - ' . Yii::t('app', 'Admin panel'); ?></title>
    <?php $this->head() ?>
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="fixed-sidebar">
<?php $this->beginBody() ?>

<div class="wrapper">
    
    <!-- Mobile menu overlay -->
    <div class="mobile-menu-overlay"></div>

    <!-- Sidebar -->
    <?php echo $this->render('/layouts/_sidebar'); ?>

    <div class="site-content">

        <!-- Header -->
        <?php echo $this->render('/layouts/_header'); ?>
        <div class="breadcrumb-area">
            <div class="container-fluid">
                <?= Breadcrumbs::widget([
                    'homeLink' => [
                        'label' => 'Административная панель',
                        'url' => '/admin/index',
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    //'links' => $this->params['breadcrumbs'],
                ]); ?>
            </div>
        </div>
            
        <!-- Content -->
        <div class="container-fluid m-t-20">
            
            <?= Alert::widget(); ?>
            
            <?= $content; ?>
            
        </div>
            
    </div>
</div>
    
<!-- Footer -->
<footer>
    <div class="container-fluid">
        &copy; <?php echo date('Y'); ?> &laquo;<?php echo Yii::$app->name; ?>&raquo;
    </div>
</footer>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
