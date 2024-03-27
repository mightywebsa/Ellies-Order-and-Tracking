<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pricelists".
 *
 * @property string $pricelist_id
 * @property string $item_code
 * @property string $item_desc
 * @property float $item_base_price
 */
class Pricelists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pricelists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pricelist_id', 'item_code', 'item_desc'], 'required'],
            [['item_base_price'], 'number'],
            [['pricelist_id'], 'string', 'max' => 10],
            [['item_code'], 'string', 'max' => 50],
            [['item_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pricelist_id' => 'Pricelist Code',
            'item_code' => 'Item Code',
            'item_desc' => 'Item Desc',
            'item_base_price' => 'Item Base Price',
        ];
    }
}
