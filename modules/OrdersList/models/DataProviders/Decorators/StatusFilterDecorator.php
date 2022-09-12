<?php

namespace app\modules\ordersList\models\DataProviders\Decorators;

class StatusFilterDecorator extends AbstractFilterDecorator
{
    const URL_PARAM = 'status';
    const ACTIVE_TEXT = 'active';

    public function setFilterParam() : FilterDecoratorInterface
    {
        $this->urlParam = self::URL_PARAM;
        $this->activeText = self::ACTIVE_TEXT;

        return $this;
    }

}