<?php

use app\modules\ordersList\models\orders\OrdersSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var OrdersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $serviceHeaderFilterItems */
/** @var array $modeHeaderFilterItems */
/** @var array $statuses */
/** @var array $requestParams */
/** @var array $searchTypes */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <ul class="nav nav-tabs p-b">
        <?php foreach ($statuses as $status) : ?>
            <li class="<?= $status['active'] ?>">
                <?= Html::a($status['label'], $status['url']) ?>
            </li>
        <?php endforeach; ?>
        <li class="pull-right custom-search">
            <?php $form = ActiveForm::begin([
                'method' => 'get',
                'action' => [Url::current(array_fill_keys(['search', 'searchType', 'service_id', 'mode'], null))],
                'options' => ['class' => 'form-inline'],
            ]) ?>
            <div class="input-group">
                <?=Html::tag('input','',[
                    'type' => 'text',
                    'name' => 'search',
                    'class' => 'form-control',
                    'placeholder' =>  Yii::t('common', 'Search orders'),
                    'value' => ArrayHelper::getValue($requestParams, 'search', '')
                ]) ?>
                <span class="input-group-btn search-select-wrap">
                    <?= $this->render('widgets/search_types_filter_dropdown', [
                        'searchTypes' => $searchTypes,
                        'requestParams' => $requestParams,
                    ]); ?>
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </span>
            </div>
            <?php ActiveForm::end() ?>
        </li>
    </ul>
    <?= $this->render('widgets/orders_grid', [
        'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
        'serviceHeaderFilterItems' => $serviceHeaderFilterItems,
        'modeHeaderFilterItems' => $modeHeaderFilterItems,
        'statusesItems' => $statuses,
    ]) ?>
</div>