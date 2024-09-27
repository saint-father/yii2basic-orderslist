<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList\models\dataProviders;

use app\modules\ordersList\models\dataProviders\decorators\FilterDecoratorInterface;

/**
 * Inteface for data-providers
 */
interface FilterDataProviderInterface
{
    /**
     * Data provider initialization
     *
     * @param string $providerName
     * @param array $config
     * @return mixed
     */
    public static function init(string $providerName, array $config = []) : self;

    /**
     * Set result data decorator
     *
     * @param FilterDecoratorInterface $decorator
     * @return $this
     */
    public function setDecorator(string $decorator) : self;

    /**
     * Get source data Items without decoration
     *
     * @return array
     */
    public function getDataItems() : array;

    /**
     * Get array of items for dropdown or other selection type filter
     *
     * @return array
     */
    public function getItems() : array;
}