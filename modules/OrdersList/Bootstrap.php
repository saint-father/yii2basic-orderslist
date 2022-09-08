<?php

namespace app\modules\OrdersList;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{

    /**
     * @inheritDoc
     */
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules(
            [
                [
                    'class' => 'app\modules\OrdersList\components\OrdersListUrlRule',
                ],
                '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<page:\d+>' => '<_m>/<_c>/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/page-<page:\d+>' => '<_m>/<_c>/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/status-<status:\d+>' => '<_m>/<_c>/index',
            ]
        );
    }
}