<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Html;

/** @var ActiveRecord $current */
/** @var Query $langs */
?>
<div id="lang">
    <span id="current-lang">
        <?= $current->name;?>
    </span>
    <ul id="langs">
        <?php foreach ($langs as $lang):?>
            <li class="item-lang">
                <?= Html::a($lang->name, '/' . $lang->url . Yii::$app->getRequest()->getLangUrl()) ?>
            </li>
        <?php endforeach;?>
    </ul>
</div>