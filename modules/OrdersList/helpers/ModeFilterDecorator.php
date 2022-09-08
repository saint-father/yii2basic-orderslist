<?php

namespace app\modules\OrdersList\helpers;

use Yii;

class ModeFilterDecorator extends AbstractFilterDecorator
{
    const URL_PARAM = 'mode';

    public function __construct()
    {
        $this->urlParam = self::URL_PARAM;
    }

    public function itemDecorator(array $item) : array
    {
        $filterItem = parent::itemDecorator($item);
        $filterItem['label'] = Yii::t('common', $filterItem['label']);

        return $filterItem;
    }
}