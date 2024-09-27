<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList\models\dataProviders\decorators;

/**
 * Filter-items data (value and labels) decorator interface
 */
interface FilterDecoratorInterface
{
    /**
     * Provides specific data structure and additional parameters for filter items
     *
     * @param array $item
     * @return array
     */
    public function itemsDecorator(array $item) : array;
}