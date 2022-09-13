<?php

namespace app\modules\ordersList\models\dataProviders\decorators;

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