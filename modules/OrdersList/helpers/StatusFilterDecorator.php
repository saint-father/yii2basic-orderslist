<?php

namespace app\modules\OrdersList\helpers;

class StatusFilterDecorator extends AbstractFilterDecorator
{
    const URL_PARAM = 'status';

    public function __construct()
    {
        $this->urlParam = self::URL_PARAM;
    }

}