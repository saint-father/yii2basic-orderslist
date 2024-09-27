<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList\models\dataProviders;

/**
 * {@inheritdoc}
 */
class StatusFilterDataProvider extends AbstractFilterDataProvider
{
    const PENDING_STATUS = 0;
    const IN_PROGRESS_STATUS = 1;
    const COMPLETED_STATUS = 2;
    const CANCELED_STATUS = 3;
    const FAIL_STATUS = 4;

    /**
     * 0 - Pending, 1 - In progress, 2 - Completed, 3 - Canceled, 4 - Fail
     *
     * @return array[]
     */
    public function getDataItems() : array
    {
        return [
            ['label' => '',                           'value' => null],
            ['label' => 'orders.pending_status',      'value' => self::PENDING_STATUS],
            ['label' => 'orders.in_progress_status',  'value' => self::IN_PROGRESS_STATUS],
            ['label' => 'orders.completed_status',    'value' => self::COMPLETED_STATUS],
            ['label' => 'orders.canceled_status',     'value' => self::CANCELED_STATUS],
            ['label' => 'orders.fail_status',         'value' => self::FAIL_STATUS],
        ];
    }
}