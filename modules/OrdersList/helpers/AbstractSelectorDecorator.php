<?php

namespace app\modules\ordersList\helpers;

use app\modules\ordersList\models\DataProviders\Decorators\FilterDecoratorInterface;
use Yii;
use yii\helpers\Url;

abstract class AbstractSelectorDecorator implements FilterDecoratorInterface
{
    public static function get(string $decorator) : FilterDecoratorInterface
    {
        return new $decorator();
    }

    public function firstItemDecorator(array $item) : array
    {
        return [
            'label' => Yii::t('common', $item['label'] ?? 'All'),
            'value' => ''
        ];
    }

    public function itemDecorator(array $item) : array
    {
        return [
            'value' => $item['value'],
            'label' => $item['label']['text'] ?? $item['label'],
        ];
    }
}