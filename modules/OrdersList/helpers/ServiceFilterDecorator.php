<?php

namespace app\modules\OrdersList\helpers;

use yii\bootstrap5\Html;

class ServiceFilterDecorator extends AbstractFilterDecorator
{
    const URL_PARAM = 'service';

    public function __construct()
    {
        $this->urlParam = self::URL_PARAM;
    }

    public function firstItemDecorator(array $item) : array
    {
        $filterItem = parent::firstItemDecorator($item);
        $filterItem['label'] .= ' (' . $item['label']['suffix'] . ')';

        return $filterItem;
    }

    public function itemDecorator(array $item) : array
    {
        $filterItem = parent::itemDecorator($item);
        $filterItem['label'] = Html::tag('span', Html::encode($item['label']['prefix']), ['class' => 'label-id']) . $filterItem['label'];

        return $filterItem;
    }
}