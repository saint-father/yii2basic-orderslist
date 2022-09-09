<?php

namespace app\modules\OrdersList\models;

use app\modules\OrdersList\models\DataProviders\AbstractFilterDataProvider;
use app\modules\OrdersList\models\DataProviders\ModeFilterDataProvider;
use app\modules\OrdersList\models\DataProviders\SearchTypeSelectorDataProvider;
use app\modules\OrdersList\models\DataProviders\ServiceFilterDataProvider;
use app\modules\OrdersList\models\DataProviders\StatusFilterDataProvider;
use app\modules\OrdersList\models\Orders\OrdersSearch;

class OrdersFacade
{
    /**
     * @var array
     */
    private static array $requestParams;

    private static ServiceFilterDataProvider $serviceFilterDataProvider;
    private static ModeFilterDataProvider $modeFilterDataProvider;
    private static StatusFilterDataProvider $statusFilterDataProvider;
    private static SearchTypeSelectorDataProvider $searchTypeSelectorDataProvider;

//    public function __construct(
//        ServiceFilterDataProvider $serviceFilterDataProvider,
//        ModeFilterDataProvider $modeFilterDataProvider,
//        StatusFilterDataProvider $statusFilterDataProvider,
//        SearchTypeSelectorDataProvider $searchTypeSelectorDataProvider
//    ) {
//    }

    public static function get(array $requestParams) : self
    {
        self::$requestParams = $requestParams;
        self::$serviceFilterDataProvider = AbstractFilterDataProvider::get('ServiceFilterDataProvider');
//        self::modeFilterDataProvider = ModeFilterDataProvider;
//        self::statusFilterDataProvider = StatusFilterDataProvider;
//        self::searchTypeSelectorDataProvider = SearchTypeSelectorDataProvider;

        return new self();
    }

//    private function init()
//    {
//
//    }

    public function getViewConfig() : array
    {
        ini_set('memory_limit', 1170000000);

        $searchModel = new OrdersSearch();

        return [
            'searchModel' => $searchModel,
            'dataProvider' => $searchModel->getData(self::$requestParams),
            'serviceHeaderFilterItems' => self::$serviceFilterDataProvider->getItems(),
            'modeHeaderFilterItems' => $this->modeFilterDataProvider->getItems(),
            'statuses' => $this->statusFilterDataProvider->getItems(),
            'requestParams' => self::$requestParams,
            'searchTypes' => $this->searchTypeSelectorDataProvider->getItems(),
        ];
    }
}