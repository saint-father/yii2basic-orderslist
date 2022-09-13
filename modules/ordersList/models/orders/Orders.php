<?php

namespace app\modules\ordersList\models\orders;

use app\modules\ordersList\models\services\Services;
use app\modules\ordersList\models\services\ServicesQuery;
use app\modules\ordersList\models\users\Users;
use app\modules\ordersList\models\users\UsersQuery;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
 * @property \app\modules\ordersList\models\users\Users $user
 */
class Orders extends ActiveRecord
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
     * @return ActiveQuery|ServicesQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery|UsersQuery
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
