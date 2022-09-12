<?php

namespace app\modules\OrdersList\interfaces;

use app\modules\OrdersList\models\DataProviders\Decorators\FilterDecoratorInterface;

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