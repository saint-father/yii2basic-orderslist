<?php

namespace app\modules\OrdersList\helpers;

use app\modules\OrdersList\interfaces\FilterDecoratorInterface;
use Yii;
use yii\helpers\Url;

abstract class AbstractFilterDecorator implements FilterDecoratorInterface
{
    /**
     * @var string
     */
    public string $urlParam;

    public function firstItemDecorator(array $item) : array
    {
        return [
            'label' => Yii::t('common', 'All'),
            'url' => [Url::current([$this->urlParam => $item['value']])],
            'active' => isset($this->param[$this->urlParam]) ? '' : 'true'
        ];
    }

    public function itemDecorator(array $item) : array
    {
        return [
            'label' => $item['label']['text'],
            'url' => [Url::current([$this->urlParam => $item['value']])],
            'active' => !isset($this->param[$this->urlParam]) ? '' : 'true'
        ];
    }
}