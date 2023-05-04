<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RepTripsheets;

/**
 * RepTripsheetsSearch represents the model behind the search form of `app\models\RepTripsheets`.
 */
class RepTripsheetsSearch extends RepTripsheets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'visit_date', 'visit_time'], 'safe'],
            [['user_id', 'odometer'], 'integer'],
            [['trip_distance'], 'number'],
            [['comments'], 'string'],
            [['area', 'customer_name', 'customer_town', 'customer_contact', 'customer_number', 'customer_order'], 'string', 'max' => 50],            
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
        $query = RepTripsheets::find();

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
            'id' => $this->id,
            'date' => $this->date,
            'user_id' => $this->user_id, 
            'visit_date' => $this->visit_date,
        ]);

        $query->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_town', $this->customer_town])
            ->andFilterWhere(['like', 'customer_contact', $this->customer_contact])
            ->andFilterWhere(['like', 'customer_number', $this->customer_number])
            ->andFilterWhere(['like', 'customer_order', $this->customer_order])
            //->andFilterWhere(['like', 'visit_date', $this->visit_date])
            ->andFilterWhere(['between', 'visit_date', $this->visit_date, $this->visit_date])
            ->andFilterWhere(['like', 'visit_time', $this->visit_time])
            ->andFilterWhere(['like', 'comments', $this->comments]);  
        //var_dump($this);
        return $dataProvider;
    }
}
