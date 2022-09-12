<?php

namespace app\modules\ordersList\models\DataProviders;

use app\modules\ordersList\models\DataProviders\Decorators\AbstractFilterDecorator;
use app\modules\ordersList\interfaces\FilterDataProviderInterface;
use app\modules\ordersList\models\DataProviders\Decorators\FilterDecoratorInterface;
use yii\helpers\ArrayHelper;
use app\modules\ordersList\models\DataProviders\ServiceFilterDataProvider;

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

    abstract public function getEntities() : array;

    public function getItems(): array
    {
        $itemsArray = $this->getEntities();

        if(empty($this->filterDecorator)) {
            return $itemsArray;
        }

        $menu = $this->filterDecorator->itemsDecorator($itemsArray);

        return $menu;
    }
}