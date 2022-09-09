<?php

namespace app\modules\OrdersList\helpers;

use app\modules\OrdersList\interfaces\FilterDecoratorInterface;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

abstract class AbstractFilterDecorator implements FilterDecoratorInterface
{
    /**
     * @var string
     */
    protected string $urlParam = '';
    protected string $activeText = 'true';

    public static function get(string $decorator) : FilterDecoratorInterface
    {
        return new $decorator();
    }

    public function getFilterParam()
    {
        return Yii::$app->request->get($this->urlParam);
    }

    public function firstItemDecorator(array $item) : array
    {
        $param = $this->getFilterParam();

        return [
            'label' => Yii::t('common', ArrayHelper::getValue($item, 'label.text', 'All')),
            'url' => [Url::current([$this->urlParam => ArrayHelper::getValue($item, 'value')])],
            'active' => !isset($param) ? $this->activeText : ''
        ];
    }

    public function itemDecorator(array $item) : array
    {
        $param = $this->getFilterParam();

        return [
            'label' => ArrayHelper::getValue($item, 'label.text') ?? ArrayHelper::getValue($item, 'label', '--'),
            'url' => [Url::current([$this->urlParam => $item['value']])],
            'active' => (isset($param) && $param == $item['value']) ? $this->activeText : '',
            'value' => $item['value'],
        ];
    }
}