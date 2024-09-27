<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

namespace app\modules\ordersList\controllers;

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
        $params = OrdersListPage::init(Yii::$app->request->get())->getViewConfig();

        return $this->render('index', $params);
    }

    /**
     * @return array|Response
     */
    public function actionExport()
    {
        return OrdersExport::init(Yii::$app->request->get())->export();
    }
}
