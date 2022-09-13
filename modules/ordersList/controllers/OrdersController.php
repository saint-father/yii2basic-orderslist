<?php

namespace app\modules\ordersList\controllers;

use app\modules\orders\models\searches\ServicesSearch;
use app\modules\ordersList\models\OrdersExport;
use app\modules\ordersList\models\OrdersListPage;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    /**
     * Lists all Orders models or filtered by URL parameters
     *
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index', OrdersListPage::init(Yii::$app->request->get())->getViewConfig());
    }

    /**
     * @return array|Response
     */
    public function actionExport()
    {
        return OrdersExport::init(Yii::$app->request->get())->export();
    }
}
