<?php

namespace app\modules\ordersList\models\DataProviders;

use app\modules\ordersList\models\DataProviders\Decorators\ModeFilterDecorator;
use app\modules\ordersList\models\DataProviders\AbstractFilterDataProvider;

class ModeFilterDataProvider extends AbstractFilterDataProvider
{
    public function getEntities() : array
    {
        return [
            ['label' => '',   'value' => null],
            ['label' => 'orders.manual_mode',   'value' => 0],
            ['label' => 'orders.auto_mode',     'value' => 1],
        ];
    }
}