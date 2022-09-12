<?php

namespace app\modules\OrdersList\components;

use Yii;
use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class OrdersListUrlRule extends BaseObject implements UrlRuleInterface
{
    const MODULE_URL = 'orderslist/orders';

    public function createUrl($manager, $route, $params)
    {
        if (strpos($route, self::MODULE_URL) !== false) {
            $route = rtrim($route, '/index');

            if (isset($params['status']) && $params['status'] != Yii::$app->request->get('status')) {
                unset($params['mode']);
                unset($params['service_id']);

                return $route . '?' . http_build_query($params);
            }
        }

        return false;
    }

    public function parseRequest($manager, $request)
    {
        if (
            strpos($request->url, self::MODULE_URL) !== false
            && strpos($request->url, '?') !== false
        ) {
            $parts = parse_url($request->url);
            parse_str($parts['query'], $params);
            $path = trim($parts['path'], '/');

            return [$path, $params];
        }

        return false;
    }
}