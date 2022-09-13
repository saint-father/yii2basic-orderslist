<?php

namespace app\modules\ordersList\models\dataProviders\decorators;

use Yii;

class ModeFilterDecorator extends AbstractFilterDecorator
{
    /**
     * Filter specific URL param name
     */
    const URL_PARAM = 'mode';

    /**
     * {@inheritdoc}
     *
     * @return FilterDecoratorInterface
     */
    public function setFilterParam() : FilterDecoratorInterface
    {
        $this->urlParam = self::URL_PARAM;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @param array $item
     * @return array
     * @throws \Exception
     */
    public function itemDecorator(array $item) : array
    {
        $filterItem = parent::itemDecorator($item);
        $filterItem['label'] = Yii::t('common', $filterItem['label']);

        return $filterItem;
    }
}