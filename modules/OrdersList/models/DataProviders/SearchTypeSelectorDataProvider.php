<?php

namespace app\modules\ordersList\models\DataProviders;

use app\modules\ordersList\interfaces\FilterDataProviderInterface;

class SearchTypeSelectorDataProvider extends AbstractFilterDataProvider implements FilterDataProviderInterface
{
    public function getEntities() : array
    {
        return [
                0 => 'orders.search_order_id',
                1 => 'orders.search_link',
                2 => 'orders.search_username',
            ];
    }
}