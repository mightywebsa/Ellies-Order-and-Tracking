<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Picking;

/**
 * PickingSearch represents the model behind the search form of `app\models\Picking`.
 */
class PickingSearch extends Picking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_ps_id', 'fl_ps_control_in', 'fl_ps_admin_in', 'fl_ps_admin_out', 'fl_ps_control_out', 'fl_ps_store_in', 'fl_ps_pickers', 'fl_ps_stock_lines_picked', 'fl_ps_store_out', 'fl_ps_control_check', 'fl_ps_cancel', 'fl_ps_final_inv', 'fl_ps_dispatch_in', 'fl_ps_dispatch_out', 'fl_ps_diamond_in', 'fl_ps_diamond_method', 'fl_ps_diamond_out', 'fl_ps_complete', 'fl_ps_diamondprint', 'fl_ps_diamond_sameday', 'fl_ps_is_replacement'], 'integer'],
            [['fl_ps_no', 'fl_ps_order_no', 'fl_ps_company', 'fl_ps_repcode', 'fl_ps_customer', 'fl_ps_inv_date', 'fl_ps_inv_del_date', 'fl_ps_inv_final_del_date', 'fl_ps_inv_status', 'fl_ps_control_in_date', 'fl_ps_admin_in_date', 'fl_ps_admin_status', 'fl_ps_admin_out_date', 'fl_ps_control_out_date', 'fl_ps_store_in_date', 'fl_ps_pickers_date', 'fl_ps_pickers_assigned', 'fl_ps_checkers_assigned', 'fl_ps_stock_lines', 'fl_ps_store_out_date', 'fl_ps_store_edit', 'fl_ps_control_check_date', 'fl_ps_control_check_comments', 'fl_ps_final_inv_date', 'fl_ps_final_inv_no', 'fl_ps_dispatch_in_date', 'fl_ps_dispatch_type', 'fl_ps_dispatch_status', 'fl_ps_dispatch_out_date', 'fl_ps_diamond_in_date', 'fl_ps_diamond_out_date', 'fl_ps_delivery', 'fl_ps_pod', 'fl_ps_pod_date', 'fl_ps_pod_reason', 'fl_ps_stock_status', 'fl_ps_stock_date', 'fl_ps_stock_order', 'fl_ps_tripsheetno'], 'safe'],
            [['fl_ps_inv_amount', 'fl_ps_amount', 'fl_ps_tripsheetweight'], 'number'],
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
        $query = Picking::find();

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
            'fl_ps_id' => $this->fl_ps_id,
            'fl_ps_inv_date' => $this->fl_ps_inv_date,
            'fl_ps_inv_del_date' => $this->fl_ps_inv_del_date,
            'fl_ps_inv_final_del_date' => $this->fl_ps_inv_final_del_date,
            'fl_ps_control_in' => $this->fl_ps_control_in,
            'fl_ps_control_in_date' => $this->fl_ps_control_in_date,
            'fl_ps_admin_in' => $this->fl_ps_admin_in,
            'fl_ps_admin_in_date' => $this->fl_ps_admin_in_date,
            'fl_ps_admin_out' => $this->fl_ps_admin_out,
            'fl_ps_admin_out_date' => $this->fl_ps_admin_out_date,
            'fl_ps_control_out' => $this->fl_ps_control_out,
            'fl_ps_control_out_date' => $this->fl_ps_control_out_date,
            'fl_ps_store_in' => $this->fl_ps_store_in,
            'fl_ps_store_in_date' => $this->fl_ps_store_in_date,
            'fl_ps_pickers' => $this->fl_ps_pickers,
            'fl_ps_pickers_date' => $this->fl_ps_pickers_date,
            'fl_ps_stock_lines_picked' => $this->fl_ps_stock_lines_picked,
            'fl_ps_store_out' => $this->fl_ps_store_out,
            'fl_ps_store_out_date' => $this->fl_ps_store_out_date,
            'fl_ps_control_check' => $this->fl_ps_control_check,
            'fl_ps_control_check_date' => $this->fl_ps_control_check_date,
            'fl_ps_cancel' => $this->fl_ps_cancel,
            'fl_ps_final_inv' => $this->fl_ps_final_inv,
            'fl_ps_final_inv_date' => $this->fl_ps_final_inv_date,
            'fl_ps_inv_amount' => $this->fl_ps_inv_amount,
            'fl_ps_dispatch_in' => $this->fl_ps_dispatch_in,
            'fl_ps_dispatch_in_date' => $this->fl_ps_dispatch_in_date,
            'fl_ps_dispatch_out' => $this->fl_ps_dispatch_out,
            'fl_ps_dispatch_out_date' => $this->fl_ps_dispatch_out_date,
            'fl_ps_diamond_in' => $this->fl_ps_diamond_in,
            'fl_ps_diamond_in_date' => $this->fl_ps_diamond_in_date,
            'fl_ps_diamond_method' => $this->fl_ps_diamond_method,
            'fl_ps_diamond_out' => $this->fl_ps_diamond_out,
            'fl_ps_diamond_out_date' => $this->fl_ps_diamond_out_date,
            'fl_ps_pod_date' => $this->fl_ps_pod_date,
            'fl_ps_complete' => $this->fl_ps_complete,
            'fl_ps_diamondprint' => $this->fl_ps_diamondprint,
            'fl_ps_diamond_sameday' => $this->fl_ps_diamond_sameday,
            'fl_ps_stock_date' => $this->fl_ps_stock_date,
            'fl_ps_is_replacement' => $this->fl_ps_is_replacement,
            'fl_ps_amount' => $this->fl_ps_amount,
            'fl_ps_tripsheetweight' => $this->fl_ps_tripsheetweight,
        ]);

        $query->andFilterWhere(['like', 'fl_ps_no', $this->fl_ps_no])
            ->andFilterWhere(['like', 'fl_ps_order_no', $this->fl_ps_order_no])
            ->andFilterWhere(['like', 'fl_ps_company', $this->fl_ps_company])
            ->andFilterWhere(['like', 'fl_ps_repcode', $this->fl_ps_repcode])
            ->andFilterWhere(['like', 'fl_ps_customer', $this->fl_ps_customer])
            ->andFilterWhere(['like', 'fl_ps_inv_status', $this->fl_ps_inv_status])
            ->andFilterWhere(['like', 'fl_ps_admin_status', $this->fl_ps_admin_status])
            ->andFilterWhere(['like', 'fl_ps_pickers_assigned', $this->fl_ps_pickers_assigned])
            ->andFilterWhere(['like', 'fl_ps_checkers_assigned', $this->fl_ps_checkers_assigned])
            ->andFilterWhere(['like', 'fl_ps_stock_lines', $this->fl_ps_stock_lines])
            ->andFilterWhere(['like', 'fl_ps_store_edit', $this->fl_ps_store_edit])
            ->andFilterWhere(['like', 'fl_ps_control_check_comments', $this->fl_ps_control_check_comments])
            ->andFilterWhere(['like', 'fl_ps_final_inv_no', $this->fl_ps_final_inv_no])
            ->andFilterWhere(['like', 'fl_ps_dispatch_type', $this->fl_ps_dispatch_type])
            ->andFilterWhere(['like', 'fl_ps_dispatch_status', $this->fl_ps_dispatch_status])
            ->andFilterWhere(['like', 'fl_ps_delivery', $this->fl_ps_delivery])
            ->andFilterWhere(['like', 'fl_ps_pod', $this->fl_ps_pod])
            ->andFilterWhere(['like', 'fl_ps_pod_reason', $this->fl_ps_pod_reason])
            ->andFilterWhere(['like', 'fl_ps_stock_status', $this->fl_ps_stock_status])
            ->andFilterWhere(['like', 'fl_ps_stock_order', $this->fl_ps_stock_order])
            ->andFilterWhere(['like', 'fl_ps_tripsheetno', $this->fl_ps_tripsheetno]);

        return $dataProvider;
    }
}
