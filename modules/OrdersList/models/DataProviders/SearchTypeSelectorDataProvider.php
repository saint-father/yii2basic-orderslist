<?php

namespace app\modules\OrdersList\models\DataProviders;

use app\modules\OrdersList\helpers\ModeFilterDecorator;
use app\modules\OrdersList\helpers\SearchTypeSelectorDecorator;
use app\modules\OrdersList\helpers\StatusFilterDecorator;
use app\modules\OrdersList\models\DataProviders\AbstractFilterDataProvider;
use Yii;

class SearchTypeSelectorDataProvider extends AbstractSelectorDataProvider
{
    public function __construct(
        SearchTypeSelectorDecorator $searchTypeSelectorDecorator
    ) {
        $this->filterDecorator = $searchTypeSelectorDecorator;
    }

    public function getEntities() : array
    {
        return [
            ['label' => 'Order ID', 'value' => 0],
            ['label' => 'Link',     'value' => 1],
            ['label' => 'Username', 'value' => 2],
        ];
    }
}