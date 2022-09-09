<?php

namespace app\modules\OrdersList\models\DataProviders;

use app\modules\OrdersList\helpers\AbstractFilterDecorator;
use app\modules\OrdersList\interfaces\FilterDataProviderInterface;
use app\modules\OrdersList\interfaces\FilterDecoratorInterface;
use yii\helpers\ArrayHelper;
use app\modules\OrdersList\models\DataProviders\ServiceFilterDataProvider;

abstract class AbstractFilterDataProvider implements FilterDataProviderInterface
{
    public FilterDecoratorInterface $filterDecorator;

    public static function get(string $providerName) : FilterDataProviderInterface
    {
        $providerName = __NAMESPACE__ . '\\' . $providerName;
        return $providerName::init();
    }

    abstract public function getEntities() : array;

    public function getItems(): array
    {
        $itemsArray = $this->getEntities();
        $menu = [];
        $menu[] = $this->filterDecorator->firstItemDecorator([]);

        foreach ($itemsArray as $item) {
            $menu[] = $this->filterDecorator->itemDecorator($item);
        }

        return $menu;
    }
}