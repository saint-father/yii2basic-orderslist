<?php

namespace app\modules\ordersList\models\dataProviders\decorators;

use yii\bootstrap5\Html;

class ServiceFilterDecorator extends AbstractFilterDecorator
{
    const URL_PARAM = 'service_id';

    public function setFilterParam() : self
    {
        $this->urlParam = self::URL_PARAM;

        return $this;
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
        $filterItem['label'] = Html::tag('span', Html::encode($item['prefix']), ['class' => 'label-id']) . $filterItem['label'];

        return $filterItem;
    }
}