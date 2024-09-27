<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

namespace app\modules\ordersList\models\dataProviders;

/**
 * {@inheritdoc}
 */
class SearchTypeSelectorDataProvider extends AbstractFilterDataProvider implements FilterDataProviderInterface
{
    public const SEARCH_ORDER_ID = 0;
    public const SEARCH_LINK = 1;
    public const SEARCH_USERNAME = 2;

    /**
     * {@inheritdoc}
     *
     * @return array[]
     */
    public function getDataItems() : array
    {
        return [
                self::SEARCH_ORDER_ID => 'orders.search_order_id',
                self::SEARCH_LINK => 'orders.search_link',
                self::SEARCH_USERNAME => 'orders.search_username',
            ];
    }
}