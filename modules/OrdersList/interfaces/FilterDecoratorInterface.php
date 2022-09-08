<?php

namespace app\modules\OrdersList\interfaces;

interface FilterDecoratorInterface
{
    public function firstItemDecorator(array $item) : array;

    public function itemDecorator(array $item) : array;

}