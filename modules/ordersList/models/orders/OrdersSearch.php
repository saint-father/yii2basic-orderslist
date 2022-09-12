<?php

namespace app\modules\ordersList\models\orders;

use yii\base\Model;

/**
 * OrdersSearch represents the model behind the search form of `app\modules\ordersList\models\orders\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
//    public function rules()
//    {
//        return [
//            [['id', 'user_id', 'quantity', 'service_id', 'status', 'created_at', 'mode'], 'integer'],
//            [['link', 'user', 'service_id', 'status'], 'safe'],
//        ];
//    }

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
        $query = Orders::find()
            ->joinWith(['user u','service s'])
            ->where(array_intersect_key($params, array_flip(['status', 'mode', 'service_id'])));

        if (isset($params['search']) && isset($params['searchType']) && ($params['search'] != '')) {
            $search = $params['search'];
            $searchType = $params['searchType'];
            switch ($searchType) {
                case Orders::SEARCH_ORDER_ID:
                    $query->andWhere(['orders.id' => $search]);
                    break;
                case Orders::SEARCH_LINK:
                    $query->andWhere(['like', 'link', $search]);
                    break;
                case Orders::SEARCH_USERNAME:
                    if (strpos($search, ' ')) {
                        $userName = explode(' ', $search);
                        $query
                            ->andWhere(['or like', 'u.first_name', [$userName[0], $userName[1]]])
                            ->andWhere(['or like', 'u.last_name', [$userName[0], $userName[1]]]);
                        break;
                    }
                    $query
                        ->andWhere(['like', 'u.first_name', $search])
                        ->orWhere(['like', 'u.last_name', $search]);
                    break;
            }
        }

        return $query;
    }
}
