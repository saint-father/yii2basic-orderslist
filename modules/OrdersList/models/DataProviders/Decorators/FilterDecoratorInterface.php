<?php

namespace app\modules\ordersList\models\DataProviders\Decorators;

interface FilterDecoratorInterface
{
    public function itemsDecorator(array $item) : array;
}