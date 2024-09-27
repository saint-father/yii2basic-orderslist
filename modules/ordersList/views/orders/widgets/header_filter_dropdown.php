<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

/** @var array $headerFilterItems */
/** @var string $headerTitle */
/** @var string $headerButtonId */

use yii\helpers\Html;
use yii\widgets\Menu;
?>

<?= Html::tag(
        'div',
        Menu::widget([
            'items' => $headerFilterItems,
            'encodeLabels' => false,
            'options' => [
                'aria-labelledby' => 'dropdownMenu1',
                'class' => 'dropdown-menu',
            ],
        ]) . Html::button($headerTitle, [
            'class' => 'btn btn-th btn-default dropdown-toggle',
            'type' => "button",
            'id' => $headerButtonId,
            'data-toggle' =>"dropdown",
            'aria-haspopup' =>"true",
            'aria-expanded' =>"true"
        ]),
        ['class' => 'dropdown']
    ); ?>
