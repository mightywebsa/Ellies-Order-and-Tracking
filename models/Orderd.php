<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_orderd".
 *
 * @property int $id Order Details ID
 * @property string $item_code Stock Code
 * @property int $item_qty Qty Ordered
 * @property float $item_price Item Price
 *
 * @property Soh $itemCode
 * @property TbOrderh $tbOrderh
 */
class Orderd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_orderd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'item_code', 'item_qty'], 'required'],
            [['id', 'item_qty'], 'integer'],
            [['item_price'], 'number'],
            [['item_code'], 'string', 'max' => 20],
            [['id'], 'unique'],
            [['item_code'], 'exist', 'skipOnError' => true, 'targetClass' => Soh::className(), 'targetAttribute' => ['item_code' => 'stock_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_code' => 'Item Code',
            'item_qty' => 'Item Qty',
            'item_price' => 'Item Price',
        ];
    }

    /**
     * Gets query for [[ItemCode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemCode()
    {
        return $this->hasOne(Soh::className(), ['stock_code' => 'item_code']);
    }

    /**
     * Gets query for [[TbOrderh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbOrderh()
    {
        return $this->hasOne(TbOrderh::className(), ['id' => 'id']);
    }
}
