<?php

namespace app\modules\OrdersList\models\DataProviders;

use app\modules\OrdersList\helpers\ServiceFilterDecorator;
use app\modules\OrdersList\models\Services\Services;

class ServiceFilterDataProvider extends AbstractFilterDataProvider
{

    public function __construct(
        ServiceFilterDecorator $serviceFilterDecorator
    ) {
        $this->filterDecorator = $serviceFilterDecorator;
    }

    public static function init()
    {
        die('88888');
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