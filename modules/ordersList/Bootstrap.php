<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
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