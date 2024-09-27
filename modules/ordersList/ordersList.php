<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

namespace app\modules\ordersList;

use Yii;
use yii\base\Module;
use yii\i18n\PhpMessageSource;

/**
 * "orderslist" module definition class
 */
class ordersList extends Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\ordersList\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        Yii::$app->i18n->translations['common*'] = [
            'class' => PhpMessageSource::class,
            'basePath' => __DIR__ . '/messages',
        ];
    }
}
