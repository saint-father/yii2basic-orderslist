<?php

namespace app\modules\OrdersList\models\Mode;

use app\modules\OrdersList\helpers\ModeFilterDecorator;
use app\modules\OrdersList\models\AbstractFilterDataProvider;

class ModeFilterDataProvider extends AbstractFilterDataProvider
{
    public function __construct(
        ModeFilterDecorator $filterDecorator
    ) {
        $this->filterDecorator = $filterDecorator;
    }

    public function getEntities() : array
    {
        return [
            ['label' => 'Manual', 'value' => 0],
            ['label' => 'Auto', 'value' => 1],
        ];
    }
}