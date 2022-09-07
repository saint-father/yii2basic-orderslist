<?php

use yii\db\Migration;

/**
 * Class m220906_083147_alter_orders_table
 */
class m220906_083147_alter_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('FK_orders_services', 'orders', 'service_id', 'services', 'id');
        $this->addForeignKey('FK_orders_users', 'orders', 'user_id', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_orders_services', 'orders');
        $this->dropForeignKey('FK_orders_users', 'orders');
    }
}
