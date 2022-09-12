<?php

namespace app\modules\ordersList\models\DataProviders;

use app\modules\ordersList\models\DataProviders\Decorators\ServiceFilterDecorator;
use app\modules\ordersList\interfaces\FilterDataProviderInterface;
use app\modules\ordersList\models\Services\Services;

class ServiceFilterDataProvider extends AbstractFilterDataProvider
{
    private function getQuery()
    {
        return Services::find()->getServicesSelectItems();
    }

    public function getEntities() : array
    {
        return $this->getQuery()->asArray()->all();
    }

    public function getItems(): array
    {
        $itemsArray = $this->getEntities();

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