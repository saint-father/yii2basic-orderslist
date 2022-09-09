<?php

namespace app\modules\OrdersList\models\Services;

use app\modules\OrdersList\models\Orders\Orders;
use app\modules\OrdersList\models\Orders\OrdersQuery;
use app\modules\OrdersList\models\Services\ServicesQuery;
use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $name
 *
 * @property Orders[] $orders
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Service ID'),
            'name' => Yii::t('app', 'Service'),
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\OrdersList\models\Orders\OrdersQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['service_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicesQuery(get_called_class());
    }
}
