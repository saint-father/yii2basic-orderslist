<?php

namespace app\modules\OrdersList\models\Services;

use app\modules\OrdersList\helpers\ServiceFilterDecorator;

class ServiceFilterDataProvider
{

    public function __construct(
        ServiceFilterDecorator $serviceFilterDecorator
    ) {
        $this->filterDecorator = $serviceFilterDecorator;
    }

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
        $count = $this->getQuery()->sum('prefix');
        $menu = [];
        $menu[] = $this->filterDecorator->firstItemDecorator(['label' => ['suffix' => $count], 'value' => null]);

        foreach ($itemsArray as $item) {
            $menu[] = $this->filterDecorator->itemDecorator(['label' => ['prefix' => $item['prefix'], 'text' => $item['label']], 'value' => $item['value']]);
        }

        return $menu;
    }
}