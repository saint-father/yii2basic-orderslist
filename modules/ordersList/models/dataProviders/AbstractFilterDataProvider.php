<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

namespace app\modules\ordersList\models\dataProviders;

use app\modules\ordersList\models\dataProviders\decorators\AbstractFilterDecorator;
use app\modules\ordersList\models\dataProviders\decorators\FilterDecoratorInterface;

/**
 * Data-provider class for filters
 */
abstract class AbstractFilterDataProvider implements FilterDataProviderInterface
{
    /**
     * Data and structure decorator
     *
     * @var FilterDecoratorInterface
     */
    public FilterDecoratorInterface $filterDecorator;

    /**
     * Initialize data provider
     *
     * @param string $providerName
     * @param array $config
     * @return FilterDataProviderInterface
     */
    public static function init(string $providerName, array $config = []): FilterDataProviderInterface
    {
        /** @var FilterDataProviderInterface $dataProvider */
        $dataProvider = new $providerName();

        if (!empty($config['decorator'])) {
            $dataProvider->setDecorator($config['decorator']);
        }

        return $dataProvider;
    }

    /**
     * Set data and structure decorator
     *
     * @param string $decorator
     * @return FilterDataProviderInterface
     */
    public function setDecorator(string $decorator) : FilterDataProviderInterface
    {
        $this->filterDecorator = AbstractFilterDecorator::init($decorator);

        return $this;
    }

    /**
     * Provides array of clear data without decoration
     *
     * @return array
     */
    abstract public function getDataItems() : array;

    /**
     * Provides array of data with decoration
     *
     * @return array
     */
    public function getItems(): array
    {
        $itemsArray = $this->getDataItems();

        if(empty($this->filterDecorator)) {
            return $itemsArray;
        }

        $menu = $this->filterDecorator->itemsDecorator($itemsArray);

        return $menu;
    }
}