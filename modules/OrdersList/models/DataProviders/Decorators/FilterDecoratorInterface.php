<?php

namespace app\modules\OrdersList\models\DataProviders\Decorators;

interface FilterDecoratorInterface
{
    public function itemsDecorator(array $item) : array;
}