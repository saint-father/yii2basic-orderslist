<?php

namespace app\modules\ordersList\models\dataProviders;

use app\modules\ordersList\models\dataProviders\FilterDataProviderInterface;

class SearchTypeSelectorDataProvider extends AbstractFilterDataProvider implements FilterDataProviderInterface
{
    public function getDataItems() : array
    {
        return [
                0 => 'orders.search_order_id',
                1 => 'orders.search_link',
                2 => 'orders.search_username',
            ];
    }
}