<?php

namespace app\modules\OrdersList\helpers;

use app\modules\OrdersList\models\Services;
use Yii;
use yii\bootstrap5\Html;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class ServiceFilter
{
    private Services $services;

    public function __construct(
        Services $services
    ) {
        $this->services = $services;
    }

    public function getItems(): array
    {
        $services = $this->services::find()->getCountedServices();

        $servicesArray = $services->asArray()->all();
        $count = $services->sum('service_count');
        $serviceMenu = [['label' => Yii::t('common', 'All') . ' (' . $count . ')',
            'url' => [Url::current(["service" => null])],
            'active' => isset($this->param['service']) ? '' : 'true'
        ]];
        foreach ($servicesArray as $service) {
            $serviceMenu[] = [
                'label' => Html::tag('span', Html::encode($service['service_count']), ['class' => 'label-id']) . $service['service'],
                'url' => [Url::current(["service" => $service['service_id']])],
                'active' => !isset($this->param['service']) ? '' : 'true'
            ];
        }

        return $serviceMenu;
    }
}