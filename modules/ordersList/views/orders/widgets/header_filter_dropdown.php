<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
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
        ]) . Html::button($headerTitle . Html::tag('span', '', ['class' => 'caret']), [
            'class' => 'btn btn-th btn-default dropdown-toggle',
            'type' => "button",
            'id' => $headerButtonId,
            'data-toggle' =>"dropdown",
            'aria-haspopup' =>"true",
            'aria-expanded' =>"true"
        ]),
        ['class' => 'dropdown']
    ); ?>
