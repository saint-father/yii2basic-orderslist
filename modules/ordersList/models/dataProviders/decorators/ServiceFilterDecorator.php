<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList\models\dataProviders\decorators;

use yii\bootstrap5\Html;

/**
 * {@inheritdoc}
 */
class ServiceFilterDecorator extends AbstractFilterDecorator
{
    /**
     * Filter specific URL param name
     */
    const URL_PARAM = 'service_id';

    /**
     * {@inheritdoc}
     *
     * @return $this
     */
    public function setFilterParam() : self
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
    public function firstItemDecorator(array $item) : array
    {
        $filterItem = parent::firstItemDecorator($item);
        $filterItem['label'] .= ' (' . $item['label']['suffix'] . ')';

        return $filterItem;
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
        $filterItem['label'] = Html::tag('span', Html::encode($item['prefix']), ['class' => 'label-id']) . $filterItem['label'];

        return $filterItem;
    }
}