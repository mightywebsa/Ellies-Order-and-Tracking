<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_customer".
 *
 * @property int $fl_customer_id Customer ID
 * @property string $fl_customer_name Customer Name
 * @property string|null $fl_customer_addr1 Customer Address Line 1
 * @property string|null $fl_customer_addr2 Customer Address Line 2
 * @property string|null $fl_customer_town Customer City
 * @property string|null $fl_customer_province
 * @property string|null $fl_customer_country Country Code
 * @property string|null $fl_customer_comment Customer Comments
 * @property string|null $fl_cust_email Customer Email
 * @property string $fl_date_last_used Last date customer was used
 * @property int $fl_cust_rep Customer's Rep
 * @property string|null $fl_cust_group Customer Group eg Shoprite
 * @property string|null $fl_cust_category Customer Category
 * @property string|null $fl_cust_accpac Accpac Account Number
 * @property string $fl_cust_active Is the Customer Active
 * @property int $fl_cust_pref_delivery
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_customer_name', 'fl_date_last_used', 'fl_cust_rep', 'fl_cust_active'], 'required'],
            [['fl_customer_name', 'fl_customer_addr1', 'fl_customer_addr2', 'fl_customer_town', 'fl_customer_comment', 'fl_cust_email'], 'string'],
            [['fl_date_last_used'], 'safe'],
            [['fl_cust_rep', 'fl_cust_pref_delivery'], 'integer'],
            [['fl_customer_province'], 'string', 'max' => 2],
            [['fl_customer_country'], 'string', 'max' => 3],
            [['fl_cust_group', 'fl_cust_category'], 'string', 'max' => 20],
            [['fl_cust_accpac'], 'string', 'max' => 8],
            [['fl_cust_active'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fl_customer_id' => 'Tracking ID',
            'fl_customer_name' => 'Name',
            'fl_customer_addr1' => 'Address Line 1',
            'fl_customer_addr2' => 'Address Lin3 2',
            'fl_customer_town' => 'City or Town',
            'fl_customer_province' => 'Province',
            'fl_customer_country' => 'Country',
            'fl_customer_comment' => 'Comment',
            'fl_cust_email' => 'Email',
            'fl_date_last_used' => 'Date Last Used',
            'fl_cust_rep' => 'Rep',
            'fl_cust_group' => 'Group',
            'fl_cust_category' => 'Category',
            'fl_cust_accpac' => 'Accpac Acc No',
            'fl_cust_active' => 'Is Active',
            'fl_cust_pref_delivery' => 'Preferred Delivery',
        ];
    }
    public static function getCustomers()
    {
	return self::find()->select('fl_customer_name')
                ->where(['fl_cust_active'=>'on'])
                ->indexBy('fl_customer_id')
                ->column();
    }
}
