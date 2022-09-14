<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
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
