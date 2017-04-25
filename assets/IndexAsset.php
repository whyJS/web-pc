<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class IndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/min.css?2017030701',
//      'css/sangarSlider.css?2017030601',
//      'css/default.css?2017030602',
    ];
    public $cssOptions = [
    ];
    public $js = [
//        'js/jquery.js',
        'js/bootstrap.min.js',
        'js/head-foot.js?2017030701',
//      'js/jquery.touchSwipe.min.js',
//      'js/imagesloaded.min.js',
//      'js/sangarSlider.js?20170218',
//      'js/plug.js',
//      'js/jquery.corner.js',
//      'js/jquery.roundabout.js',
//      'js/jquery.roundabout-shapes.js',
//      'js/news.js?2017030601',
    ];
    public $jsOptions = [

    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
