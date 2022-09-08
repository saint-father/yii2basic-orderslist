<?php

namespace app\modules\OrdersList\controllers;

use app\modules\orders\models\searches\ServicesSearch;
use app\modules\OrdersList\models\Mode\ModeFilterDataProvider;
use app\modules\OrdersList\models\Services\ServiceFilterDataProvider;
use app\modules\OrdersList\models\Orders;
use app\modules\OrdersList\models\OrdersSearch;
use app\modules\OrdersList\models\Status\StatusFilterDataProvider;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    private ServiceFilterDataProvider $serviceFilterDataProvider;
    private ModeFilterDataProvider $modeFilterDataProvider;
    private StatusFilterDataProvider $statusFilterDataProvider;

    public function __construct(
        $id,
        $module,
        $config = [],
        ServiceFilterDataProvider $serviceFilterDataProvider,
        ModeFilterDataProvider $modeFilterDataProvider,
        StatusFilterDataProvider $statusFilterDataProvider
    ) {
        parent::__construct($id, $module, $config);
        $this->serviceFilterDataProvider = $serviceFilterDataProvider;
        $this->modeFilterDataProvider = $modeFilterDataProvider;
        $this->statusFilterDataProvider = $statusFilterDataProvider;
    }

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
        ini_set('memory_limit', 1170000000);

        $searchModel = new OrdersSearch();
        $requestParams = Yii::$app->request->get();
        $dataProvider = $searchModel->getData($requestParams);
        $statuses = $this->statusFilterDataProvider->getItems();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'serviceHeaderFilterItems' => $this->serviceFilterDataProvider->getItems(),
            'modeHeaderFilterItems' => $this->modeFilterDataProvider->getItems(),
            'statuses' => $statuses
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Orders();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
