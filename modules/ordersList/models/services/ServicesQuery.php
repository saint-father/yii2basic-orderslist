<?php

namespace app\modules\ordersList\models\services;

use app\modules\ordersList\models\services\Services;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Services]].
 *
 * @see Services
 */
class ServicesQuery extends ActiveQuery
{
    /**
     * Reurns Query object for ordered services list mentioned in orders
     *
     * @return ServicesQuery
     */
    public function getServicesSelectItems() : ServicesQuery
    {
        return $this->select(['services.id value',
            'services.name label',
            'count(o.service_id) prefix'])
            ->innerJoin('orders o', 'o.service_id = services.id')
            ->groupBy('o.service_id')
            ->orderBy('prefix desc');
    }
}
