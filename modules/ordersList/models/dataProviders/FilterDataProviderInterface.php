<?php

namespace app\modules\ordersList\models\dataProviders;

use app\modules\ordersList\models\dataProviders\decorators\FilterDecoratorInterface;

interface FilterDataProviderInterface
{
    /**
     * Data provider initialization
     *
     * @param string $providerName
     * @param array $config
     * @return mixed
     */
    public static function init(string $providerName, array $config = []);

    /**
     * Set result data decorator
     *
     * @param FilterDecoratorInterface $decorator
     * @return $this
     */
    public function setDecorator(FilterDecoratorInterface $decorator) : self;

    /**
     * Get source data Items without decoration
     *
     * @return array
     */
    public function getDataItems() : array;

    /**
     * Get array of items for dropdown or other selection type filter
     *
     * @return array
     */
    public function getItems() : array;
}