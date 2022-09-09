<?php

namespace app\modules\OrdersList\models\Orders;

use app\modules\OrdersList\models\Orders\OrdersQuery;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\OrdersList\models\Orders\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\modules\OrdersList\models\Orders\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'quantity', 'service_id', 'status', 'created_at', 'mode'], 'integer'],
            [['link', 'user'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * @param $params
     * @return OrdersQuery
     */
    public function search($params)
    {
        $query = Orders::find();

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $query;
        }

        $query->joinWith(['user','service']);

//        $dataProvider->sort->attributes['user'] = [
//            'asc' => ['users.first_name' => SORT_ASC],
//            'desc' => ['users.first_name' => SORT_DESC],
//        ];
//
//        if (empty($dataProvider->sort->getAttributeOrders())) {
//            $dataProvider->sort->attributes = ['id' => SORT_DESC];
//        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'quantity' => $this->quantity,
            'service_id' => $this->service_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'mode' => $this->mode,
        ]);

        $query->andFilterWhere(['like', 'link', $this->link]);

        return $query;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function getData($requestParams)
    {
        $query = $this->search($requestParams);
        $countQuery = clone $query;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'totalCount' => (int)$countQuery->count(),
            'pagination' => [
                'pageSize' => 10,
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $dataProvider;
    }

    public function getStatuses($requestParams)
    {
        $query = $this->search($requestParams);

        return $query->select(['status'])->distinct()->asArray()->all();
    }
}
