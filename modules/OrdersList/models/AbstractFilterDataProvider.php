<?php

namespace app\modules\OrdersList\models;

use app\modules\OrdersList\helpers\AbstractFilterDecorator;
use app\modules\OrdersList\interfaces\FilterDataProviderInterface;
use app\modules\OrdersList\interfaces\FilterDecoratorInterface;

abstract class AbstractFilterDataProvider implements FilterDataProviderInterface
{
    public FilterDecoratorInterface $filterDecorator;

    abstract public function getEntities() : array;

    public function getItems(): array
    {
        $itemsArray = $this->getEntities();
        $menu = [];
        $menu[] = $this->filterDecorator->firstItemDecorator(['label' => [], 'value' => null]);

        foreach ($itemsArray as $item) {
            $menu[] = $this->filterDecorator->itemDecorator(['label' => ['text' => $item['label']], 'value' => $item['value']]);
        }

        return $menu;
    }
}