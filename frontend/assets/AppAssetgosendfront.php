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
class AppAssetgosendfront extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',		
		'assets/gsn11/css/bootstrap.css',
		//'assets/gsn11/css/font-awesome.css',
		//'assets/gsn11/css/custom.css',
    ];
    public $js = [
			'assets/gsn11/js/jquery-1.10.2.js',
			'assets/gsn11/js/bootstrap.min.js',
			'assets/gsn11/js/jquery.metisMenu.js',
			'assets/gsn11/js/custom.js',
    ];
    public $depends = [
       // 'yii\web\YiiAsset',
		//'yii\bootstrap\BootstrapAsset',
    ];
}
