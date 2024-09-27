<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Orders list page asset
 */
class OrdersListAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@app/modules/ordersList/views/orders';
    /**
     * @var string
     */
    public $baseUrl = '@web';
    /**
     * @var string[]
     */
    public $css = [
        'css/custom.css',
        'css/bootstrap.min.css',
    ];
    /**
     * @var string[]
     */
    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.min.js',
    ];
    /**
     * @var array
     */
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
    /**
     * @var string[]
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
