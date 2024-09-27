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