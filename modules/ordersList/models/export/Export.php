<?php

namespace app\modules\ordersList\models\export;

use Yii;
use yii\base\Model;
use yii\db\Query;
use yii\web\RangeNotSatisfiableHttpException;

class Export extends Model
{
    /**
     * @var array
     */
    private array $headers;
    /**
     * @var Query
     */
    private Query $orders;

    /**
     * Set orders query to get items
     *
     * @param $orders
     * @return $this
     */
    public function setOrders($orders): Export
    {
       $this->orders = $orders;

       return $this;
    }

    /**
     * Set headers list to insert in CSV
     *
     * @param $headers
     * @return $this
     */
    public function setHeaders($headers): Export
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Export data in CSV file
     *
     * @throws RangeNotSatisfiableHttpException
     */
    public function exportCsv()
    {
        $data = implode(';', $this->headers) . "\r\n";
        $this->orders->orderBy(['id' => SORT_DESC]);
        
        foreach ($this->orders->each() as $order) {
            $data .= $order->id.
                ';' . $order->user->first_name . ' ' . $order->user->last_name .
                ';' . $order->link .
                ';' . $order->quantity .
                ';' . $order->service->name .
                ';' . $order->status .
                ';' . $order->mode .
                ';' . date("Y-m-d H:i:s", $order->created_at) .
                "\r\n";
        }

        return Yii::$app->response->sendContentAsFile($data, 'orders.csv', [
            'mimeType' => 'application/csv',
            'inline'   => false
        ]);
    }
}