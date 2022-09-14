<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var \app\modules\ordersList\models\orders\OrdersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $serviceHeaderFilterItems */
/** @var array $modeHeaderFilterItems */
/** @var array $statusesItems */

$this->title = Yii::t('common', 'Orders');
$this->params['breadcrumbs'][] = $this->title;

?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'layout' => "{items}\n{summary}\n{pager}",
    'summary' => Yii::t('common', "{begin} to {end} of {totalCount}"),
    'tableOptions' => [
            'class' => 'table order-table'
        ],
        'columns' => [
            'id',
            [
                'attribute' => 'orders.user',
                'label' => Yii::t('common', 'orders.user'),
                'value' => function ($model) {
                    return $model->user->first_name . ' ' . $model->user->last_name;
                },
            ],
            'link',
            'quantity',
            [
                'attribute' => 'service_id',
                'header' => $this->render('header_filter_dropdown', [
                    'headerTitle' => Yii::t('common', 'orders.service'),
                    'headerButtonId' => 'serviceDropdownFilterBtn',
                    'headerFilterItems' => $serviceHeaderFilterItems,
                ]),
                'content' => function($model) {
                    return Html::tag('span', Html::encode($model->service->id), ['class' => 'label-id'])  . " " . $model->service->name ;},
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) use ($statusesItems){
                    return ArrayHelper::getValue(ArrayHelper::map($statusesItems,'value','label'), $model->status, 'not set');
                },
            ],
            [
                'attribute' => 'mode',
                'header' => $this->render('header_filter_dropdown', [
                    'headerTitle' => Yii::t('common', 'orders.mode'),
                    'headerButtonId' => 'modeDropdownFilterBtn',
                    'headerFilterItems' => $modeHeaderFilterItems,
                ]),
                'value' => function ($model) use ($modeHeaderFilterItems){
                    return ArrayHelper::getValue(ArrayHelper::map($modeHeaderFilterItems,'value','label'), $model->mode, 'not set');
                },
            ],
            [
                'attribute' => 'created_at',
                'value'=>function($model){
                    return date("Y-m-d H:i:s",$model->created_at);
                }
            ],
        ],
    ]); ?>
