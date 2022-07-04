<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reps;

/**
 * RepsSearch represents the model behind the search form of `app\models\Reps`.
 */
class RepsSearch extends Reps
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_rep_code', 'fl_rep_active'], 'integer'],
            [['fl_rep_name', 'fl_rep_fullname', 'fl_rep_email', 'fl_rep_active'], 'safe'],
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
        $query = Reps::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
        'attributes' => [
            'id',
            'fl_rep_code',
            'fl_rep_name',
            'fl_rep_fullname',
            'fl_rep_email',            
            'fl_rep_active' => [
                'asc' => ['fl_rep_code' => SORT_ASC],
                'desc' => ['fl_rep_code' => SORT_DESC],
                'label' => 'Active',
                'default' => SORT_DESC
            
            ],
            ],
         ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'fl_rep_code' => $this->fl_rep_code,
            'fl_rep_active' => $this->fl_rep_active,
        ]);

        $query->andFilterWhere(['like', 'fl_rep_name', $this->fl_rep_name])
            ->andFilterWhere(['like', 'fl_rep_fullname', $this->fl_rep_fullname])
            ->andFilterWhere(['like', 'fl_rep_email', $this->fl_rep_email]);

        return $dataProvider;
    }
}
