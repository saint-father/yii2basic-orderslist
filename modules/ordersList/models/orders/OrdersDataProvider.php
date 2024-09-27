<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList\models\orders;

use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * Data-provider class for orders list GridView
 */
class OrdersDataProvider
{
    /**
     * Default page size
     */
    const PAGE_SIZE = 100;

    /**
     * @var array
     */
    private static array $requestParams;
    /**
     * @var OrdersSearch
     */
    private OrdersSearch $ordersSearch;

    /**
     * OrdersDataProvider constructor
     *
     * @param OrdersSearch $ordersSearch
     */
    public function __construct(
        OrdersSearch $ordersSearch
    ) {
        $this->ordersSearch = $ordersSearch;
    }

    /**
     * Initialization
     *
     * @param $requestParams
     * @return static
     */
    public static function init(array $requestParams) : self
    {
        self::$requestParams = $requestParams;

        return new self(new OrdersSearch());
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function getData() : ActiveDataProvider
    {
        $query = $this->getQery();
        $countQuery = clone $query;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'totalCount' => (int)$countQuery->count(),
            'pagination' => [
                'pageSize' => self::PAGE_SIZE,
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $dataProvider;
    }

    /**
     * Returns query with requested params
     *
     * @param array $requestParams
     * @return Query
     */
    public function getQery() : Query
    {
        return $this->ordersSearch->search(self::$requestParams);
    }
}