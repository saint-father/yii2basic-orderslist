<?php

namespace app\modules\OrdersList\models\Orders;

use app\modules\OrdersList\models\Orders\OrdersQuery;
use app\modules\OrdersList\models\Services\Services;
use app\modules\OrdersList\models\Services\ServicesQuery;
use app\modules\OrdersList\models\Users\Users;
use app\modules\OrdersList\models\Users\UsersQuery;
use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $user_id
 * @property string $link
 * @property int $quantity
 * @property int $service_id
 * @property int $status 0 - Pending, 1 - In progress, 2 - Completed, 3 - Canceled, 4 - Fail
 * @property int $created_at
 * @property int $mode 0 - Manual, 1 - Auto
 *
 * @property Services $service
 * @property \app\modules\OrdersList\models\Users\Users $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'link', 'quantity', 'service_id', 'status', 'created_at', 'mode'], 'required'],
            [['user_id', 'quantity', 'service_id', 'status', 'created_at', 'mode'], 'integer'],
            [['link'], 'string', 'max' => 300],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['service_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'orders.id'),
            'user_id' => Yii::t('common', 'orders.user_id'),
            'link' => Yii::t('common', 'orders.link'),
            'quantity' => Yii::t('common', 'orders.quantity'),
            'service_id' => Yii::t('common', 'orders.service_id'),
            'status' => Yii::t('common', 'orders.status'),
            'created_at' => Yii::t('common', 'orders.created_at'),
            'mode' => Yii::t('common', 'orders.mode'),
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery|ServicesQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\OrdersList\models\Users\UsersQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }
}
