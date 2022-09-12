<?php

namespace app\modules\ordersList\models\services;

use app\modules\ordersList\models\services\Services;

/**
 * This is the ActiveQuery class for [[Services]].
 *
 * @see Services
 */
class ServicesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Services[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Services|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return ServicesQuery
     */
    public function getServicesSelectItems() : ServicesQuery
    {
        return $this->select(['services.id value',
            'services.name label',
            'count(o.service_id) prefix'])
            ->innerJoin('orders o', 'o.service_id = services.id')
            ->innerJoin('users u', 'u.id = o.user_id ')
            ->groupBy('o.service_id')
            ->orderBy('prefix desc');
    }
}
