<?php

namespace app\modules\ordersList\components;

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
            // collect an appropriate parameters (filters) and set default value to check in URL
            $checkedParams = ['search', 'searchType', 'status'];
            $checkedParams = array_combine(
                $checkedParams,
                array_map(fn($param) : string => Yii::$app->request->get($param, ''), $checkedParams)
            );

            if (
                isset($params['search'])
                && isset($params['searchType'])
                && (
                    $params['search'] != $checkedParams['search']
                    || $params['searchType'] != $checkedParams['searchType']
                )
            ) {
                unset($params['mode']);
                unset($params['service_id']);

                return $route . '?' . http_build_query($params);
            }

            if (isset($params['status']) && $params['status'] != $checkedParams['status']) {
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