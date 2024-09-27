<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

namespace app\modules\ordersList\models\dataProviders\decorators;

use app\modules\ordersList\models\lang\Lang;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * Decorator class for filter-items data (value and labels) decorators with common features
 */
abstract class AbstractFilterDecorator implements FilterDecoratorInterface
{
    /**
     * URL parameter for link helper
     *
     * @var string
     */
    protected string $urlParam = '';
    /**
     * Attribute value for selected item
     *
     * @var string
     */
    protected string $activeText = 'true';
    /**
     * @var string
     */
    public static string $currentLangId;

    /**
     * Initialize decorator instance by class name
     *
     * @param string $decoratorName
     * @return FilterDecoratorInterface
     */
    public static function init(string $decoratorName) : FilterDecoratorInterface
    {
        self::$currentLangId = Lang::getCurrent()->id;
        /** @var FilterDecoratorInterface $decorator */
        $decorator = new $decoratorName();

        return $decorator->setFilterParam();
    }

    /**
     * Set URL param name for links
     *
     * @return FilterDecoratorInterface
     */
    abstract public function setFilterParam() : FilterDecoratorInterface;

    /**
     * Get URL param name for links
     *
     * @return array|mixed
     */
    public function getFilterParam()
    {
        return Yii::$app->request->get($this->urlParam);
    }

    /**
     * Data structure decorator for the first item of selector
     *
     * @param array $item
     * @return array
     * @throws \Exception
     */
    public function firstItemDecorator(array $item) : array
    {
        $param = $this->getFilterParam();

        return [
            'label' => Yii::t('common', ArrayHelper::getValue($item, 'label.text', 'All')),
            'url' => [Url::current([$this->urlParam => ArrayHelper::getValue($item, 'value'), 'lang_id' => self::$currentLangId])],
            'active' => !isset($param) ? $this->activeText : ''
        ];
    }

    /**
     * Data structure decorator for selector item
     *
     * @param array $item
     * @return array
     * @throws \Exception
     */
    public function itemDecorator(array $item) : array
    {
        $param = $this->getFilterParam();

        return [
            'label' => Yii::t('common',
                ArrayHelper::getValue($item, 'label.text') ?? ArrayHelper::getValue($item, 'label', '--')
            ),
            'url' => [Url::current([$this->urlParam => $item['value'], 'lang_id' => self::$currentLangId])],
            'active' => (isset($param) && $param == $item['value']) ? $this->activeText : '',
            'value' => $item['value'],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array $itemsArray
     * @return array
     * @throws \Exception
     */
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