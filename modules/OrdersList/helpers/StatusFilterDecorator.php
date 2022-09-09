<?php

namespace app\modules\OrdersList\helpers;

class StatusFilterDecorator extends AbstractFilterDecorator
{
    const URL_PARAM = 'status';
    const ACTIVE_TEXT = 'active';

    public function __construct()
    {
        $this->urlParam = self::URL_PARAM;
        $this->activeText = self::ACTIVE_TEXT;
    }

}