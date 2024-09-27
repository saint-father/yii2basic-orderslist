<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList\models\dataProviders;

use app\modules\ordersList\models\services\Services;
use app\modules\ordersList\models\services\ServicesQuery;

/**
 * {@inheritdoc}
 */
class ServiceFilterDataProvider extends AbstractFilterDataProvider
{
    /**
     * Get services entity query
     *
     * @return ServicesQuery
     */
    private function getQuery()
    {
        return Services::find()->getServicesSelectItems();
    }

    /**
     * {@inheritdoc}
     * @return array[]
     */
    public function getDataItems() : array
    {
        return $this->getQuery()->asArray()->all();
    }

    /**
     * {@inheritdoc}
     * @return array[]
     */
    public function getItems(): array
    {
        $itemsArray = $this->getDataItems();

        if (empty($this->filterDecorator)) {
            return $itemsArray;
        }

        $count = $this->getQuery()->sum('prefix');

        array_map(fn($item): array => [
            'label' => ['prefix' => $item['prefix'], 'text' => $item['label']],
            'value' => $item['value']
        ], $itemsArray);

        array_unshift($itemsArray, ['label' => ['suffix' => $count], 'value' => null]);

        return $this->filterDecorator->itemsDecorator($itemsArray);
    }
}