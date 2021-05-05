<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StorePersonnel;

/**
 * StorePersonnelSearch represents the model behind the search form of `app\models\StorePersonnel`.
 */
class StorePersonnelSearch extends StorePersonnel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_sto_id', 'fl_sto_active'], 'integer'],
            [['fl_sto_name', 'fl_sto_position'], 'safe'],
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
        $query = StorePersonnel::find();

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
            'fl_sto_id' => $this->fl_sto_id,
            'fl_sto_active' => $this->fl_sto_active,
        ]);

        $query->andFilterWhere(['like', 'fl_sto_name', $this->fl_sto_name])
            ->andFilterWhere(['like', 'fl_sto_position', $this->fl_sto_position]);

        return $dataProvider;
    }
}
