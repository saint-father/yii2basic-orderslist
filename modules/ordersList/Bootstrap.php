<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList;

use yii\base\BootstrapInterface;

/**
 * Module specific bootstrap
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritDoc
     */
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules(
            [
                '' => 'orderslist/orders',
                'orders' => 'orderslist/orders/index',
                [
                    'class' => 'app\modules\ordersList\components\OrdersListUrlRule',
                ],
            ]
        );
    }
}