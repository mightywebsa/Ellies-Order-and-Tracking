<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customers;

/**
 * CustomersSearch represents the model behind the search form of `app\models\Customers`.
 */
class CustomersSearch extends Customers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_customer_id', 'fl_cust_rep', 'fl_cust_pref_delivery'], 'integer'],
            [['fl_customer_name', 'fl_customer_addr1', 'fl_customer_addr2', 'fl_customer_town', 'fl_customer_province', 'fl_customer_country', 'fl_customer_comment', 'fl_cust_email', 'fl_date_last_used', 'fl_cust_group', 'fl_cust_category', 'fl_cust_accpac', 'fl_cust_active'], 'safe'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Customers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'fl_customer_id' => $this->fl_customer_id,
            'fl_date_last_used' => $this->fl_date_last_used,
            'fl_cust_rep' => $this->fl_cust_rep,
            'fl_cust_pref_delivery' => $this->fl_cust_pref_delivery,
        ]);

        $query->andFilterWhere(['like', 'fl_customer_name', $this->fl_customer_name])
            ->andFilterWhere(['like', 'fl_customer_addr1', $this->fl_customer_addr1])
            ->andFilterWhere(['like', 'fl_customer_addr2', $this->fl_customer_addr2])
            ->andFilterWhere(['like', 'fl_customer_town', $this->fl_customer_town])
            ->andFilterWhere(['like', 'fl_customer_province', $this->fl_customer_province])
            ->andFilterWhere(['like', 'fl_customer_country', $this->fl_customer_country])
            ->andFilterWhere(['like', 'fl_customer_comment', $this->fl_customer_comment])
            ->andFilterWhere(['like', 'fl_cust_email', $this->fl_cust_email])
            ->andFilterWhere(['like', 'fl_cust_group', $this->fl_cust_group])
            ->andFilterWhere(['like', 'fl_cust_category', $this->fl_cust_category])
            ->andFilterWhere(['like', 'fl_cust_accpac', $this->fl_cust_accpac])
            ->andFilterWhere(['like', 'fl_cust_active', $this->fl_cust_active]);

        return $dataProvider;
    }
}
