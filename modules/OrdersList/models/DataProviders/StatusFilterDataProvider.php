<?php

namespace app\modules\OrdersList\models\DataProviders;

use app\modules\OrdersList\helpers\AbstractFilterDecorator;
use app\modules\OrdersList\helpers\StatusFilterDecorator;
use app\modules\OrdersList\models\DataProviders\AbstractFilterDataProvider;

class StatusFilterDataProvider extends AbstractFilterDataProvider
{
    public function __construct(
        StatusFilterDecorator $serviceFilterDecorator
    ) {
        $this->filterDecorator = AbstractFilterDecorator::get('StatusFilterDecorator');
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