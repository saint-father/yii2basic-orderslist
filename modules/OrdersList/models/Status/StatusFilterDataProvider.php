<?php

namespace app\modules\OrdersList\models\Status;

use app\modules\OrdersList\helpers\StatusFilterDecorator;
use app\modules\OrdersList\models\AbstractFilterDataProvider;

class StatusFilterDataProvider extends AbstractFilterDataProvider
{
    public function __construct(
        StatusFilterDecorator $serviceFilterDecorator
    ) {
        $this->filterDecorator = $serviceFilterDecorator;
    }

    /**
     * 0 - Pending, 1 - In progress, 2 - Completed, 3 - Canceled, 4 - Fail
     *
     * @return array[]
     */
    public function getEntities() : array
    {
        return [
            ['label' => 'Pending',      'value' => 0],
            ['label' => 'In progress',  'value' => 1],
            ['label' => 'Completed',    'value' => 2],
            ['label' => 'Canceled',     'value' => 3],
            ['label' => 'Fail',         'value' => 4],
        ];
    }
}