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
 * Orders list page asset for IE9
 */
class OrdersListIE9Asset extends AssetBundle
{
    /**
     * @var array
     */
    public $jsOptions = [
        'condition' => 'lte IE9',
        'position' => View::POS_HEAD
    ];
    /**
     * @var string[]
     */
    public $js = [
        'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
    ];
}
