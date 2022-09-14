<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

namespace app\modules\ordersList\models;

use app\modules\ordersList\models\export\Export;
use app\modules\ordersList\models\orders\Orders;
use app\modules\ordersList\models\orders\OrdersDataProvider;
use yii\web\Response;

/**
 * Orders Export action processor
 */
class OrdersExport
{
    /**
     * @var array
     */
    private static array $requestParams;
    /**
     * @var Orders
     */
    private Orders $orders;
    /**
     * @var Export
     */
    private Export $export;

    /**
     * Orders exporter constructor
     *
     * @param Orders $orders
     */
    public function __construct(
        Orders $orders,
        Export $export
    ) {
        $this->orders = $orders;
        $this->export = $export;
    }

    /**
     * Initialization
     *
     * @param array $requestParams
     * @return static
     */
    public static function init(array $requestParams) : self
    {
        self::$requestParams = $requestParams;

        return new self(new Orders(), new Export());
    }

    /**
     * Provides data-config for view
     *
     * @return array
     */
    public function export() : Response
    {
        $orders  = OrdersDataProvider::init(self::$requestParams)->getQery();
        $headers = $this->orders->attributeLabels();

        return $this->export->setHeaders($headers)->setOrders($orders)->exportCsv();
    }
}