<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList\models\dataProviders\decorators;

/**
 * {@inheritdoc}
 */
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