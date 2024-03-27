<?php

namespace app\models;

use Yii;
use app\models\Customers;
use app\models\Reps;


/**
 * This is the model class for table "tb_orderh".
 *
 * @property int $id Order ID
 * @property string $ord_date Order Date
 * @property int $ord_customer_id Customer ID
 * @property int $ord_rep Rep
 * @property float $ord_total_excl Order Total Excl Vat
 * @property float $ord_vat Vat 
 * @property float $ord_total_incl Order Total Incl Vat
 * @property string $ord_timestamp Timestamp
 *
 * @property TbCustomer $ordCustomer
 * @property TbOrderd $id0
 * @property TbReps $ordRep
 */
class Orderh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_orderh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ord_date', 'ord_customer_id', 'ord_rep', 'ord_total_excl'], 'required'],
            [['id', 'ord_customer_id', 'ord_rep'], 'integer'],
            [['ord_date', 'ord_timestamp'], 'safe'],
            [['ord_total_excl', 'ord_vat', 'ord_total_incl'], 'number'],
            [['id'], 'unique'],
            [['ord_customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['ord_customer_id' => 'fl_customer_id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Orderd::className(), 'targetAttribute' => ['id' => 'id']],
            [['ord_rep'], 'exist', 'skipOnError' => true, 'targetClass' => Reps::className(), 'targetAttribute' => ['ord_rep' => 'fl_rep_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ord_date' => 'Ord Date',
            'ord_customer_id' => 'Ord Customer ID',
            'ord_rep' => 'Ord Rep',
            'ord_total_excl' => 'Ord Total Excl',
            'ord_vat' => 'Ord Vat',
            'ord_total_incl' => 'Ord Total Incl',
            'ord_timestamp' => 'Ord Timestamp',
        ];
    }

    /**
     * Gets query for [[OrdCustomer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdCustomer()
    {
        return $this->hasOne(Customer::className(), ['fl_customer_id' => 'ord_customer_id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Orderd::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[OrdRep]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdRep()
    {
        return $this->hasOne(Reps::className(), ['fl_rep_code' => 'ord_rep']);
    }
}
