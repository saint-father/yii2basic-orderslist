<?php

namespace app\modules\ordersList\models\dataProviders\decorators;

class StatusFilterDecorator extends AbstractFilterDecorator
{
    /**
     * Filter specific URL param name
     */
    const URL_PARAM = 'status';
    /**
     * Filter specific attribute value for selected item
     */
    const ACTIVE_TEXT = 'active';

    /**
     * {@inheritdoc}
     *
     * @return FilterDecoratorInterface
     */
    public function setFilterParam() : FilterDecoratorInterface
    {
        $this->urlParam = self::URL_PARAM;
        $this->activeText = self::ACTIVE_TEXT;

        return $this;
    }

}