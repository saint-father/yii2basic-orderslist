<?php

namespace app\modules\ordersList\models\dataProviders;

use app\modules\ordersList\models\services\Services;

class ServiceFilterDataProvider extends AbstractFilterDataProvider
{
    private function getQuery()
    {
        return Services::find()->getServicesSelectItems();
    }

    public function getDataItems() : array
    {
        return $this->getQuery()->asArray()->all();
    }

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