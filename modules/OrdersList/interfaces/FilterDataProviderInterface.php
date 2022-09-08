<?php

namespace app\modules\OrdersList\interfaces;

interface FilterDataProviderInterface
{

    public function getEntities() : array;

    /**
     * Get array of items for dropdown or other selection type filter
     *
     * @return array
     */
    public function getItems() : array;
}