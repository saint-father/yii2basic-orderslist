<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
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