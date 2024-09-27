<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

namespace app\modules\ordersList\models\dataProviders;

/**
 * {@inheritdoc}
 */
class ModeFilterDataProvider extends AbstractFilterDataProvider
{
    const MANUAL_MODE = 0;
    const AUTO_MODE = 1;

    /**
     * {@inheritdoc}
     *
     * @return array[]
     */
    public function getDataItems() : array
    {
        return [
            ['label' => '',   'value' => null],
            ['label' => 'orders.manual_mode',   'value' => self::MANUAL_MODE],
            ['label' => 'orders.auto_mode',     'value' => self::AUTO_MODE],
        ];
    }
}