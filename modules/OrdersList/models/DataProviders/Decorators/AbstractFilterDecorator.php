<?php

namespace app\modules\OrdersList\models\DataProviders\Decorators;

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

    public static function init(string $decoratorName) : FilterDecoratorInterface
    {
        $decoratorName = __NAMESPACE__ . '\\' . $decoratorName;
        /** @var FilterDecoratorInterface $decorator */
        $decorator = new $decoratorName();

        return $decorator->setFilterParam();
    }

    abstract public function setFilterParam() : FilterDecoratorInterface;

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
            'label' => Yii::t('common',
                ArrayHelper::getValue($item, 'label.text') ?? ArrayHelper::getValue($item, 'label', '--')
            ),
            'url' => [Url::current([$this->urlParam => $item['value']])],
            'active' => (isset($param) && $param == $item['value']) ? $this->activeText : '',
            'value' => $item['value'],
        ];
    }

    public function itemsDecorator(array $itemsArray) : array
    {
        $menu = [];
        $firstItem = array_shift($itemsArray);
        $menu[] = $this->firstItemDecorator($firstItem);

        foreach ($itemsArray as $item) {
            $menu[] = $this->itemDecorator($item);
        }

        return $menu;
    }
}