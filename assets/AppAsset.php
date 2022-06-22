<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,600,700,900&display=swap&subset=cyrillic',
        'vendor/bootstrap/css/bootstrap-custom.min.css',
        'vendor/fancybox/jquery.fancybox.min.css',
        'vendor/slick/slick.css',
        'vendor/slick/slick-theme.css',
        '/vendor/fancybox/jquery.fancybox.min.css',
        'css/helper-classes.min.css',
        'css/main.css',
    ];
    public $js = [
//        'vendor/bootstrap/js/bootstrap.min.js',
        'vendor/fancybox/jquery.fancybox.min.js',
        'vendor/slick/slick.min.js',
        'vendor/mask/jquery.mask.min.js',
        'vendor/object-fit/ofi.min.js',
        'vendor/smoothscrollbar/smooth-scrollbar.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
