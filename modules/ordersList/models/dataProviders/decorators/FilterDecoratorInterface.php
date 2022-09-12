<?php

namespace app\modules\ordersList\models\dataProviders\decorators;

interface FilterDecoratorInterface
{
    public function itemsDecorator(array $item) : array;
}