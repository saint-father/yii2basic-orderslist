<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220914_065834_lang
 */
class m220914_065834_lang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%lang}}', [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING . '(255) NOT NULL',
            'local' => Schema::TYPE_STRING . '(255) NOT NULL',
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'default' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
            'date_update' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date_create' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->batchInsert('lang', ['url', 'local', 'name', 'default', 'date_update', 'date_create'], [
            ['en', 'en-EN', 'English', 1, time(), time()],
            ['ru', 'ru-RU', 'Русский', 0, time(), time()],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lang}}');
    }
}
