<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\modules\OrdersList\assets\OrdersListIE9Asset;
use app\modules\OrdersList\assets\OrdersListAsset;
use yii\bootstrap5\Html;

OrdersListIE9Asset::register($this);
OrdersListAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
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
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <?= Html::a(Yii::t('common', 'Orders'), ['/orders']) ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?= $content ?>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
