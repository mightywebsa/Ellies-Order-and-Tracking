<?php

namespace app\models;

use Yii;
use app\models\Customers;

/**
 * This is the model class for table "tb_otd".
 *
 * @property int $fl_otd_id
 * @property string $fl_otd_dec_serial
 * @property string $fl_otd_smart_card
 * @property string $fl_otd_date
 * @property string $fl_otd_decoder_status
 * @property string $fl_otd_received
 * @property string $fl_otd_cust
 * @property int $fl_otd_cust_id
 * @property string $fl_otd_ra
 * @property float $fl_otd_dec_cost
 * @property string $fl_otd_dunno Decoder Code
 * @property string $fl_otd_repl_inv
 * @property string $fl_otd_grn
 * @property string $fl_otd_claim_no
 * @property string $fl_otd_comments
 * @property string $fl_otd_rtt
 * @property string $fl_otd_lnb_sn
 * @property string $fl_otd_return_no
 * @property string $fl_otd_credit_note
 */
class Otd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_otd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_otd_dec_serial', 'fl_otd_smart_card', 'fl_otd_date', 'fl_otd_decoder_status', 'fl_otd_received', 'fl_otd_cust', 'fl_otd_cust_id', 'fl_otd_ra', 'fl_otd_dec_cost', 'fl_otd_dunno', 'fl_otd_repl_inv', 'fl_otd_grn', 'fl_otd_claim_no', 'fl_otd_comments', 'fl_otd_rtt', 'fl_otd_lnb_sn', 'fl_otd_return_no', 'fl_otd_credit_note'], 'required'],
            [['fl_otd_date'], 'safe'],
            [['fl_otd_cust_id'], 'integer'],
            [['fl_otd_dec_cost'], 'number'],
            [['fl_otd_dec_serial', 'fl_otd_smart_card', 'fl_otd_decoder_status', 'fl_otd_rtt', 'fl_otd_lnb_sn', 'fl_otd_return_no', 'fl_otd_credit_note'], 'string', 'max' => 20],
            [['fl_otd_received'], 'string', 'max' => 3],
            [['fl_otd_cust'], 'string', 'max' => 30],
            [['fl_otd_ra', 'fl_otd_claim_no'], 'string', 'max' => 10],
            [['fl_otd_dunno'], 'string', 'max' => 100],
            [['fl_otd_repl_inv', 'fl_otd_grn'], 'string', 'max' => 15],
            [['fl_otd_comments'], 'string', 'max' => 200],
            [['fl_otd_dec_serial', 'fl_otd_lnb_sn'], 'unique', 'targetAttribute' => ['fl_otd_dec_serial', 'fl_otd_lnb_sn']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fl_otd_id' => 'Otd ID',
            'fl_otd_dec_serial' => 'Decoder Serial',
            'fl_otd_smart_card' => 'Smart Card',
            'fl_otd_date' => 'Date',
            'fl_otd_decoder_status' => 'Decoder Status',
            'fl_otd_received' => 'Received',
            'fl_otd_cust' => 'Customer',
            'fl_otd_cust_id' => 'Customer ID',
            'fl_otd_ra' => 'RA Number',
            'fl_otd_dec_cost' => 'Decoder Cost',
            'fl_otd_dunno' => 'Misc Field',
            'fl_otd_repl_inv' => 'Replacement Inv',
            'fl_otd_grn' => 'GRN No',
            'fl_otd_claim_no' => 'Claim No',
            'fl_otd_comments' => 'Comments',
            'fl_otd_rtt' => 'RTT No',
            'fl_otd_lnb_sn' => 'Fl Otd Lnb Sn',
            'fl_otd_return_no' => 'Return No',
            'fl_otd_credit_note' => 'Credit Note',
        ];
    }
    
    public function getCustomer()
    {
        return $this->hasOne(Customers::className(), ['fl_otd_cust'=>'fl_customer_id']);
    }
}
