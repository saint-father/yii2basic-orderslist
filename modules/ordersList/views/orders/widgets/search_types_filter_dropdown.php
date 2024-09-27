<?php
/**
 * @link https://github.com/saint-father/yii2basic-orderslist/
 * @copyright Copyright (c) 2022 Fedorov Alexey
 * @license https://github.com/saint-father/yii2basic-orderslist/license/
 */

/** @var array $searchTypes */
/** @var array $requestParams */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>

<?= Html::dropDownList(
        'searchType',
        ArrayHelper::getValue($requestParams, 'searchType',3),
        $searchTypes,
        ['class' => 'form-control search-select']);
?>
