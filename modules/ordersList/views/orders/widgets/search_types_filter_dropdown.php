<?php

/** @var array $searchTypes */
/** @var array $requestParams */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Menu;
?>

<?= Html::dropDownList(
        'searchType',
        ArrayHelper::getValue($requestParams, 'searchType',3),
        $searchTypes,
        ['class' => 'form-control search-select']);
?>
