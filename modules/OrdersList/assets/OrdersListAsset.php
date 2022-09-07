<?php

namespace app\modules\OrdersList\assets;

use yii\web\AssetBundle;
use yii\web\View;

class OrdersListAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/OrdersList/views/orders';
    public $baseUrl = '@web';
    public $css = [
        'css/custom.css',
        'css/bootstrap.min.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.min.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
