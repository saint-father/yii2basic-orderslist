<?php

namespace app\modules\OrdersList\models;

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
    public function getCountedServices() : ServicesQuery
    {
        return $this->select(['services.id service_id',
            'services.name service',
            'count(o.service_id) service_count'])
            ->innerJoin('orders o', 'o.service_id = services.id')
            ->innerJoin('users u', 'u.id = o.user_id ')
            ->groupBy('o.service_id')
            ->orderBy('service_count desc');
    }
}
