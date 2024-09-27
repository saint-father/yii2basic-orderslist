<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList\models\dataProviders\decorators;

use Yii;

/**
 * {@inheritdoc}
 */
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