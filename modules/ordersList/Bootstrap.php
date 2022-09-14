<?php

namespace app\modules\ordersList;

use Yii;
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
                    'class' => 'app\modules\ordersList\components\OrdersListUrlRule',
                ],
            ]
        );
    }
}