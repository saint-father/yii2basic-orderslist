<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

/* @var $this \yii\web\View */
/* @var $content string */

use app\modules\ordersList\assets\OrdersListIE9Asset;
use app\modules\ordersList\assets\OrdersListAsset;
use app\modules\ordersList\models\lang\Lang;
use app\modules\ordersList\widgets\WLang;
use yii\bootstrap5\Html;
use yii\helpers\Url;

OrdersListIE9Asset::register($this);
OrdersListAsset::register($this);

$currentLang = Lang::getCurrent();
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= $currentLang->local ?>">
<head>
    <?php $this->registerCsrfMetaTags() ?>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->head() ?>
    <title></title>

    <style>
        .label-default{
            border: 1px solid #ddd;
            background: none;
            color: #333;
            min-width: 30px;
            display: inline-block;
        }
    </style>

</head>
<body>
<?php $this->beginBody() ?>
<header>
    <nav class="navbar navbar-fixed-top navbar-default">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <?= Html::a(
                            Yii::t('common', 'Orders'),
                            Url::current(array_merge(
                                array_fill_keys(array_keys(Yii::$app->request->get()), null),
                                ['lang_id' => $currentLang->id]
                            )
                        )) ?>
                    </li>
                </ul>
                <?= WLang::widget();?>
            </div>
        </div>
    </nav>
</header>
<?= $content ?>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
