<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipment;

/**
 * EquipmentSearch represents the model behind the search form of `app\models\Equipment`.
 */
class EquipmentSearch extends Equipment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipId'], 'integer'],
            [['equipType', 'equipBrand', 'equipModel', 'equipCPU', 'equipRAM', 'equipHDD', 'equipScreen', 'equipPCName', 'equipUser','equipStatus','equipSerial', 'equipAssetTag'], 'safe'],
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
        $query = Equipment::find();

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
            'equipId' => $this->equipId,
        ]);

        $query->andFilterWhere(['like', 'equipType', $this->equipType])
            ->andFilterWhere(['like', 'equipBrand', $this->equipBrand])
            ->andFilterWhere(['like', 'equipModel', $this->equipModel])
            ->andFilterWhere(['like', 'equipSerial', $this->equipSerial])
            ->andFilterWhere(['like', 'equipCPU', $this->equipCPU])
            ->andFilterWhere(['like', 'equipRAM', $this->equipRAM])
            ->andFilterWhere(['like', 'equipHDD', $this->equipHDD])
            ->andFilterWhere(['like', 'equipScreen', $this->equipScreen])                
            ->andFilterWhere(['like', 'equipPCName', $this->equipPCName])                
            ->andFilterWhere(['like', 'equipUser', $this->equipUser])
            ->andFilterWhere(['like', 'equipStatus', $this->equipStatus])
            ->andFilterWhere(['like', 'equipAssetTag', $this->equipAssetTag]);

        return $dataProvider;
    }
}
