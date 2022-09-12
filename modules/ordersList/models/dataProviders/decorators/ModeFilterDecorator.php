<?php

namespace app\modules\ordersList\models\dataProviders\decorators;

use Yii;

class ModeFilterDecorator extends AbstractFilterDecorator
{
    const URL_PARAM = 'mode';

    public function setFilterParam() : FilterDecoratorInterface
    {
        $this->urlParam = self::URL_PARAM;

        return $this;
    }

    public function itemDecorator(array $item) : array
    {
        $filterItem = parent::itemDecorator($item);
        $filterItem['label'] = Yii::t('common', $filterItem['label']);

        return $filterItem;
    }
}