<?php

namespace app\modules\OrdersList\controllers;

use app\modules\orders\models\searches\ServicesSearch;
use app\modules\OrdersList\models\OrdersFacade;
use Yii;
use yii\web\Controller;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    /**
     * Lists all Orders models.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', OrdersFacade::init(Yii::$app->request->get())->getViewConfig());
    }
}
