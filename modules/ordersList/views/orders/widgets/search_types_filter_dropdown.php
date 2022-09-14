<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
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
