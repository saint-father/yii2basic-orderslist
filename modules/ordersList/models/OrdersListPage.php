<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList\models;

use app\modules\ordersList\models\dataProviders\AbstractFilterDataProvider;
use app\modules\ordersList\models\dataProviders\decorators\ModeFilterDecorator;
use app\modules\ordersList\models\dataProviders\decorators\SearchTypeFilterDecorator;
use app\modules\ordersList\models\dataProviders\decorators\ServiceFilterDecorator;
use app\modules\ordersList\models\dataProviders\decorators\StatusFilterDecorator;
use app\modules\ordersList\models\dataProviders\FilterDataProviderInterface;
use app\modules\ordersList\models\dataProviders\ModeFilterDataProvider;
use app\modules\ordersList\models\dataProviders\SearchTypeSelectorDataProvider;
use app\modules\ordersList\models\dataProviders\ServiceFilterDataProvider;
use app\modules\ordersList\models\dataProviders\StatusFilterDataProvider;
use app\modules\ordersList\models\orders\OrdersDataProvider;

/**
 * Orders List default (index) action processor
 */
class OrdersListPage
{
    /**
     * @var array
     */
    private static array $requestParams;
    /**
     * Data providers for several filters
     *
     * @var FilterDataProviderInterface
     */
    private static FilterDataProviderInterface $serviceFilterDataProvider;
    private static FilterDataProviderInterface $modeFilterDataProvider;
    private static FilterDataProviderInterface $statusFilterDataProvider;
    private static FilterDataProviderInterface $searchTypeSelectorDataProvider;

    /**
     * Initialization
     *
     * @param array $requestParams
     * @return static
     * @TO-DO utilize Generator for providers with [Provider::class => Decorator::class] config
     */
    public static function init(array $requestParams) : self
    {
        self::$requestParams = $requestParams;

        self::$serviceFilterDataProvider = AbstractFilterDataProvider::init(
            ServiceFilterDataProvider::class,
            ['decorator' => ServiceFilterDecorator::class]
        );

        self::$modeFilterDataProvider = AbstractFilterDataProvider::init(
            ModeFilterDataProvider::class,
            ['decorator' => ModeFilterDecorator::class]
        );

        self::$statusFilterDataProvider = AbstractFilterDataProvider::init(
            StatusFilterDataProvider::class,
            ['decorator' => StatusFilterDecorator::class]
        );

        self::$searchTypeSelectorDataProvider = AbstractFilterDataProvider::init(
            SearchTypeSelectorDataProvider::class,
            ['decorator' => SearchTypeFilterDecorator::class]
        );

        return new self();
    }

    /**
     * Provides data-config for view
     *
     * @return array
     */
    public function getViewConfig() : array
    {
        $ordersList = OrdersDataProvider::init(self::$requestParams);

        return [
            'searchModel' => $ordersList,
            'dataProvider' => $ordersList->getData(),
            'serviceHeaderFilterItems' => self::$serviceFilterDataProvider->getItems(),
            'modeHeaderFilterItems' => self::$modeFilterDataProvider->getItems(),
            'statuses' => self::$statusFilterDataProvider->getItems(),
            'requestParams' => self::$requestParams,
            'searchTypes' => self::$searchTypeSelectorDataProvider->getItems(),
        ];
    }
}