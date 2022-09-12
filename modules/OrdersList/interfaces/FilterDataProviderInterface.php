<?php

namespace app\modules\ordersList\interfaces;

use app\modules\ordersList\models\DataProviders\Decorators\FilterDecoratorInterface;

interface FilterDataProviderInterface
{
    public static function init(string $providerName, array $config = []);

    public function setDecorator(FilterDecoratorInterface $decorator) : self;

    public function getEntities() : array;

    /**
     * Get array of items for dropdown or other selection type filter
     *
     * @return array
     */
    public function getItems() : array;
}