<?php

namespace app\modules\ordersList\models\dataProviders;

use app\modules\ordersList\models\dataProviders\FilterDataProviderInterface;
use app\modules\ordersList\models\dataProviders\decorators\FilterDecoratorInterface;

abstract class AbstractFilterDataProvider implements FilterDataProviderInterface
{
    public FilterDecoratorInterface $filterDecorator;

    public static function init(string $providerName, array $config = [])
    {
        $providerNamespace = __NAMESPACE__ . '\\' . $providerName;
        /** @var FilterDataProviderInterface $dataProvider */
        $dataProvider = new $providerNamespace();

        if (!empty($config['decorator'])) {
            $dataProvider->setDecorator($config['decorator']);
        }

        return $dataProvider;
    }

    public function setDecorator(FilterDecoratorInterface $decorator) : FilterDataProviderInterface
    {
        $this->filterDecorator = $decorator;

        return $this;
    }

    abstract public function getDataItems() : array;

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