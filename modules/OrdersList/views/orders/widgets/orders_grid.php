<?php

use app\modules\OrdersList\models\Services\ServiceFilterDataProvider;
use app\modules\OrdersList\models\Orders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Menu;

/** @var yii\web\View $this */
/** @var app\modules\OrdersList\models\OrdersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $serviceHeaderFilterItems */
/** @var array $modeHeaderFilterItems */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;

?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{sorter}\n{summary}\n{pager}",
        'tableOptions' => [
            'class' => 'table order-table'
        ],
        'columns' => [
            'id',
            [
                'attribute' => 'user',
                'label' => 'User',
                'value' => function ($model) {
                    return $model->user->first_name . ' ' . $model->user->last_name;
                },
            ],
            'link',
            'quantity',
            [
                'attribute' => 'service_id',
                'header' => $this->render('header_filter_dropdown', [
                    'headerTitle' => 'Service',
                    'headerButtonId' => 'serviceDropdownFilterBtn',
                    'headerFilterItems' => $serviceHeaderFilterItems,
                ]),
                'content' => function($model) {
                    return Html::tag('span', Html::encode($model->service->id), ['class' => 'label-id'])  . " " . $model->service->name ;},
            ],
            [
                'attribute' => 'status',
                'label' => 'Status',
                'value' => function ($model) {
                    return $model->status;
                },
            ],
            [
                'attribute' => 'created_at',
                'value'=>function($model){
                    return date("Y-m-d H:i:s",$model->created_at);
                }
            ],
            [
                'attribute' => 'mode',
                'label' => 'Mode',
                'header' => $this->render('header_filter_dropdown', [
                    'headerTitle' => 'Mode',
                    'headerButtonId' => 'modeDropdownFilterBtn',
                    'headerFilterItems' => $modeHeaderFilterItems,
                ]),
                'value' => function ($model) {
                    return $model->mode;
                },
            ],
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Orders $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
        ],
    ]); ?>
