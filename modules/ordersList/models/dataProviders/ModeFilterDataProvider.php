<?php

namespace app\modules\ordersList\models\dataProviders;

class ModeFilterDataProvider extends AbstractFilterDataProvider
{
    /**
     * {@inheritdoc}
     *
     * @return array[]
     */
    public function getDataItems() : array
    {
        return [
            ['label' => '',   'value' => null],
            ['label' => 'orders.manual_mode',   'value' => 0],
            ['label' => 'orders.auto_mode',     'value' => 1],
        ];
    }
}