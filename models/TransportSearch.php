<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transport;

/**
 * TransportSearch represents the model behind the search form of `app\models\Transport`.
 */
class TransportSearch extends Transport
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_trans_id', 'fl_trans_active'], 'integer'],
            [['fl_trans_name', 'fl_trans_addr1', 'fl_trans_addr2', 'fl_trans_phone', 'fl_trans_fax', 'fl_trans_cell', 'fl_trans_code'], 'safe'],
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
        $query = Transport::find();

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
            'fl_trans_id' => $this->fl_trans_id,
            'fl_trans_active' => $this->fl_trans_active,
        ]);

        $query->andFilterWhere(['like', 'fl_trans_name', $this->fl_trans_name])
            ->andFilterWhere(['like', 'fl_trans_addr1', $this->fl_trans_addr1])
            ->andFilterWhere(['like', 'fl_trans_addr2', $this->fl_trans_addr2])
            ->andFilterWhere(['like', 'fl_trans_phone', $this->fl_trans_phone])
            ->andFilterWhere(['like', 'fl_trans_fax', $this->fl_trans_fax])
            ->andFilterWhere(['like', 'fl_trans_cell', $this->fl_trans_cell])
            ->andFilterWhere(['like', 'fl_trans_code', $this->fl_trans_code]);

        return $dataProvider;
    }
}
