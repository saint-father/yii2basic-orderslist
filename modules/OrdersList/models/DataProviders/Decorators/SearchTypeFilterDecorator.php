<?php

namespace app\modules\OrdersList\models\DataProviders\Decorators;

use Yii;

class SearchTypeFilterDecorator extends AbstractFilterDecorator
{
    public function setFilterParam() : FilterDecoratorInterface
    {
        return $this;
    }

    public function itemsDecorator(array $itemsArray) : array
    {
        foreach ($itemsArray as $value => $label) {
            $itemsArray[$value] = Yii::t('common', $label);
        }

        return $itemsArray;
    }

}