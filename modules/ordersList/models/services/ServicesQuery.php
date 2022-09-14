<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

namespace app\modules\ordersList\models\services;

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
