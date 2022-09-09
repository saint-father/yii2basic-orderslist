<?php

namespace app\modules\OrdersList\components;

use yii\helpers\StringHelper;
use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class OrdersListUrlRule extends BaseObject implements UrlRuleInterface
{
    const MODULE_URL = 'orderslist/orders';

    public function createUrl($manager, $route, $params)
    {
//        if (strpos($route, self::MODULE_URL) !== false) {
//            $route = rtrim($route, '/index');
//
////            if (isset($params['page'])) {
////                $route .= '/page-' . $params['page'];
////            }
////
////            if (isset($params['status'])) {
////                $route .= '/status-' . $params['status'];
////            }
//
//            return $route;
//        }

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