<?php

namespace app\modules\ordersList\models\Orders;

use yii\data\ActiveDataProvider;

class OrdersDataProvider
{
    const PAGE_SIZE = 100;

    public function __construct(
        OrdersSearch $ordersSearch
    ) {
        $this->ordersSearch = $ordersSearch;
    }

    public static function init($requestParams) : self
    {
//        ordersSearch = new OrdersSearch();

        return new self(new OrdersSearch());
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function getData($requestParams)
    {
        $query = $this->ordersSearch->search($requestParams);
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

}