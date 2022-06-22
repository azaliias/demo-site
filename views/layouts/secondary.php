<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <?= Html::csrfMetaTags() ?>

    <!-- Favicon -->
    <link rel="icon" type="image/ico" href="/images/favicon.ico">
    <title><?= Html::encode($this->title ? $this->title : Yii::$app->name) ?></title>

    <?php $this->head() ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">

    <?= $this->render('/templates/_top') ?>

    <div class="content">
        <?php echo $content; ?>
    </div>
</div>

<?= $this->render('/templates/_bottom') ?>

<?= $this->render('/templates/_contactFormModal') ?>

<?= $this->render('/templates/_metrics') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>