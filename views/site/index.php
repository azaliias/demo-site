<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php
	$this->title = Yii::$app->settings->get('SiteSettings', 'homePageTitle') ?: Yii::$app->name;
	if (Yii::$app->settings->get('SiteSettings', 'homePageKeywords')) {
		$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('SiteSettings', 'homePageKeywords')]);
	}
	if (Yii::$app->settings->get('SiteSettings', 'homePageDescription')) {
		$this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('SiteSettings', 'homePageDescription')]);
	}
?>

<?php
	echo \app\widgets\Slider::widget();
	echo \app\widgets\Services::widget();
//	echo \app\widgets\Advantages::widget();
//	echo \app\widgets\Steps::widget();
?>

<?//= $this->render('/templates/_banner');?>

<?php
//	echo \app\widgets\News::widget();
//	echo \app\widgets\Actions::widget();
//	echo \app\widgets\Photos::widget();
//	echo \app\widgets\Partners::widget();
//	echo \app\widgets\Messages::widget();
//	echo \app\widgets\SecondSlider::widget();
?>

<?//= $this->render('/templates/_about');?>

<?php
//	echo \app\widgets\Reviews::widget();
?>