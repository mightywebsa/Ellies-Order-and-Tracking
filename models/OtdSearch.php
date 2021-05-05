<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Otd;

/**
 * OtdSearch represents the model behind the search form of `app\models\Otd`.
 */
class OtdSearch extends Otd
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_otd_id', 'fl_otd_cust_id'], 'integer'],
            [['fl_otd_dec_serial', 'fl_otd_smart_card', 'fl_otd_date', 'fl_otd_decoder_status', 'fl_otd_received', 'fl_otd_cust', 'fl_otd_ra', 'fl_otd_dunno', 'fl_otd_repl_inv', 'fl_otd_grn', 'fl_otd_claim_no', 'fl_otd_comments', 'fl_otd_rtt', 'fl_otd_lnb_sn', 'fl_otd_return_no', 'fl_otd_credit_note'], 'safe'],
            [['fl_otd_dec_cost'], 'number'],
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
        $query = Otd::find();

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
            'fl_otd_id' => $this->fl_otd_id,
            'fl_otd_date' => $this->fl_otd_date,
            'fl_otd_cust_id' => $this->fl_otd_cust_id,
            'fl_otd_dec_cost' => $this->fl_otd_dec_cost,
        ]);

        $query->andFilterWhere(['like', 'fl_otd_dec_serial', $this->fl_otd_dec_serial])
            ->andFilterWhere(['like', 'fl_otd_smart_card', $this->fl_otd_smart_card])
            ->andFilterWhere(['like', 'fl_otd_decoder_status', $this->fl_otd_decoder_status])
            ->andFilterWhere(['like', 'fl_otd_received', $this->fl_otd_received])
            ->andFilterWhere(['like', 'fl_otd_cust', $this->fl_otd_cust])
            ->andFilterWhere(['like', 'fl_otd_ra', $this->fl_otd_ra])
            ->andFilterWhere(['like', 'fl_otd_dunno', $this->fl_otd_dunno])
            ->andFilterWhere(['like', 'fl_otd_repl_inv', $this->fl_otd_repl_inv])
            ->andFilterWhere(['like', 'fl_otd_grn', $this->fl_otd_grn])
            ->andFilterWhere(['like', 'fl_otd_claim_no', $this->fl_otd_claim_no])
            ->andFilterWhere(['like', 'fl_otd_comments', $this->fl_otd_comments])
            ->andFilterWhere(['like', 'fl_otd_rtt', $this->fl_otd_rtt])
            ->andFilterWhere(['like', 'fl_otd_lnb_sn', $this->fl_otd_lnb_sn])
            ->andFilterWhere(['like', 'fl_otd_return_no', $this->fl_otd_return_no])
            ->andFilterWhere(['like', 'fl_otd_credit_note', $this->fl_otd_credit_note]);

        return $dataProvider;
    }
}
