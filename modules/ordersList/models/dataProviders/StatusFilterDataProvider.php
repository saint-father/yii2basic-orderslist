<?php

namespace app\modules\ordersList\models\dataProviders;

class StatusFilterDataProvider extends AbstractFilterDataProvider
{
    /**
     * 0 - Pending, 1 - In progress, 2 - Completed, 3 - Canceled, 4 - Fail
     *
     * @return array[]
     */
    public function getDataItems() : array
    {
        return [
            ['label' => '',                           'value' => null   ],
            ['label' => 'orders.pending_status',      'value' => 0      ],
            ['label' => 'orders.in_progress_status',  'value' => 1      ],
            ['label' => 'orders.completed_status',    'value' => 2      ],
            ['label' => 'orders.canceled_status',     'value' => 3      ],
            ['label' => 'orders.fail_status',         'value' => 4      ],
        ];
    }
}