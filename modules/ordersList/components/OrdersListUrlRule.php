<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

namespace app\modules\ordersList\components;

use Yii;
use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

/**
 * Module specific URL generator and parser
 */
class OrdersListUrlRule extends BaseObject implements UrlRuleInterface
{
    const MODULE_URL = 'orderslist/orders';

    /**
     * Create URLs with custom parameters
     *
     * @param $manager
     * @param $route
     * @param $params
     * @return bool|string
     */
    public function createUrl($manager, $route, $params)
    {
        if (strpos($route, self::MODULE_URL) !== false) {
            $route = rtrim($route, '/index');

            if (!empty($params['all'])) {
                return $route;
            }

            // collect an appropriate parameters (filters) and set default value to check in URL
            $checkedParams = ['search', 'searchType', 'status'];
            $checkedParams = array_combine(
                $checkedParams,
                array_map(fn($param) : string => Yii::$app->request->get($param, ''), $checkedParams)
            );

            // Status filter URL
            if (isset($params['status']) && $params['status'] != $checkedParams['status']) {
                unset($params['mode']);
                unset($params['service_id']);

                return $route . '?' . http_build_query($params);
            }
        }

        return false;
    }

    /**
     * Parse URLs with custom parameters
     *
     * @param $manager
     * @param $request
     * @return array|false
     */
    public function parseRequest($manager, $request)
    {
        $pathInfo = (new LangRequest())->getLangUrl();

        if (
            strpos($pathInfo, self::MODULE_URL) !== false
            && strpos($pathInfo, '?') !== false
        ) {
            $parts = parse_url($pathInfo);
            parse_str($parts['query'], $params);
            $path = trim($parts['path'], '/');

            return [$path, $params];
        }

        return false;
    }
}