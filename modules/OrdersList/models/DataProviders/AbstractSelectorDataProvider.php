<?php

namespace app\modules\OrdersList\models\DataProviders;

use app\modules\OrdersList\helpers\AbstractFilterDecorator;
use app\modules\OrdersList\interfaces\FilterDataProviderInterface;
use app\modules\OrdersList\interfaces\FilterDecoratorInterface;
use yii\helpers\ArrayHelper;

abstract class AbstractSelectorDataProvider extends AbstractFilterDataProvider
{

//    abstract public function processItems($itemsArray) : array
//    {
//        foreach ($itemsArray as $key => $item) {
//            ArrayHelper::merge($menu, $this->filterDecorator->itemDecorator(['label' => ['text' => $item['label']], 'value' => $item['value']]));
//        }
//
//        return [];
//    }

    final public function getItems(): array
    {
        $menu = parent::getItems();
        array_shift($menu);

        return ArrayHelper::map($menu, 'value', 'label');
    }
}