<?php

namespace app\modules\OrdersList\controllers;

use app\modules\orders\models\searches\ServicesSearch;
use app\modules\OrdersList\models\OrdersFacade;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Orders models.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', OrdersFacade::get(Yii::$app->request->get())->getViewConfig());
    }
}
