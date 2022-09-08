<?php

namespace app\modules\OrdersList\components;

use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class OrdersListUrlRule extends BaseObject implements UrlRuleInterface
{

    public function createUrl($manager, $route, $params)
    {
        if (strpos($route, 'orderslist/orders') !== false) {
            if (isset($params['page'])) {
                return 'orderslist/orders/page-' . $params['page'];
            }
            if (isset($params['status'])) {
                return 'orderslist/orders/status-' . $params['status'];
            }
        }
        return false;  // данное правило не применимо
    }

    public function parseRequest($manager, $request)
    {
        return false;  // данное правило не применимо
    }
}