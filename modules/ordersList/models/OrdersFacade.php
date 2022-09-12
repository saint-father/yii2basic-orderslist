<?php

namespace app\modules\ordersList\models;

use app\modules\ordersList\models\dataProviders\AbstractFilterDataProvider;
use app\modules\ordersList\models\dataProviders\decorators\AbstractFilterDecorator;
use app\modules\ordersList\models\dataProviders\ModeFilterDataProvider;
use app\modules\ordersList\models\dataProviders\SearchTypeSelectorDataProvider;
use app\modules\ordersList\models\dataProviders\ServiceFilterDataProvider;
use app\modules\ordersList\models\dataProviders\StatusFilterDataProvider;
use app\modules\ordersList\models\orders\OrdersDataProvider;

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

    public static function init(array $requestParams) : self
    {
        self::$requestParams = $requestParams;

        $serviceDecorator = AbstractFilterDecorator::init('ServiceFilterDecorator');
        self::$serviceFilterDataProvider = AbstractFilterDataProvider::init(
            'ServiceFilterDataProvider',
            ['decorator' => $serviceDecorator]
        );

        $modeDecorator = AbstractFilterDecorator::init('ModeFilterDecorator');
        self::$modeFilterDataProvider = AbstractFilterDataProvider::init(
            'ModeFilterDataProvider',
            ['decorator' => $modeDecorator]
        );

        $statusDecorator = AbstractFilterDecorator::init('StatusFilterDecorator');
        self::$statusFilterDataProvider = AbstractFilterDataProvider::init(
            'StatusFilterDataProvider',
            ['decorator' => $statusDecorator]
        );

        $searchTypeFilterDecorator = AbstractFilterDecorator::init('SearchTypeFilterDecorator');
        self::$searchTypeSelectorDataProvider = AbstractFilterDataProvider::init(
            'SearchTypeSelectorDataProvider',
            ['decorator' => $searchTypeFilterDecorator]
        );

        return new self();
    }

    public function getViewConfig() : array
    {
        ini_set('memory_limit', 1170000000);

        $searchModel = OrdersDataProvider::init(self::$requestParams);

        return [
            'searchModel' => $searchModel,
            'dataProvider' => $searchModel->getData(self::$requestParams),
            'serviceHeaderFilterItems' => self::$serviceFilterDataProvider->getItems(),
            'modeHeaderFilterItems' => self::$modeFilterDataProvider->getItems(),
            'statuses' => self::$statusFilterDataProvider->getItems(),
            'requestParams' => self::$requestParams,
            'searchTypes' => self::$searchTypeSelectorDataProvider->getItems(),
        ];
    }
}