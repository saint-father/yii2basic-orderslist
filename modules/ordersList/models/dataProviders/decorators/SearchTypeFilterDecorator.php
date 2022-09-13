<?php

namespace app\modules\ordersList\models\dataProviders\decorators;

use Yii;

class SearchTypeFilterDecorator extends AbstractFilterDecorator
{
    /**
     * {@inheritdoc}
     *
     * @return FilterDecoratorInterface
     */
    public function setFilterParam() : FilterDecoratorInterface
    {
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @param array $itemsArray
     * @return array
     */
    public function itemsDecorator(array $itemsArray) : array
    {
        foreach ($itemsArray as $value => $label) {
            $itemsArray[$value] = Yii::t('common', $label);
        }

        return $itemsArray;
    }

}