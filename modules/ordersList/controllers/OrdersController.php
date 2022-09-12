<?php

namespace app\modules\ordersList\controllers;

use app\modules\orders\models\searches\ServicesSearch;
use app\modules\ordersList\models\OrdersFacade;
use Yii;
use yii\web\Controller;

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
    public function actionIndex()
    {
        return $this->render('index', OrdersFacade::init(Yii::$app->request->get())->getViewConfig());
    }
}
