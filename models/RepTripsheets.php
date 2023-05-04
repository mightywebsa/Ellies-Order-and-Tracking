<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rep_tripsheets".
 *
 * @property int $id
 * @property string $date Entry Date and Time
 * @property int $user_id Linked to User
 * @property string $area Tripsheet Area
 * @property string $customer_name Customer Name
 * @property string $customer_town Customer Town
 * @property string $customer_contact Contact Person
 * @property string $customer_number Contact Number
 * @property string $customer_order Order Number
 * @property string $visit_date Date Visited
 * @property string $visit_time Time Visited
 * @property int $odometer
 * @property float $trip_distance
 * @property string $comments Comments
 *
 * @property User $user
 */
class RepTripsheets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rep_tripsheets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'visit_date', 'visit_time'], 'safe'],
            [['user_id', 'odometer'], 'integer'],
            [['area', 'customer_name', 'customer_town', 'customer_contact', 'customer_number', 'customer_order', 'visit_date', 'visit_time', 'comments'], 'required'],
            [['trip_distance'], 'number'],
            [['comments'], 'string'],
            [['area', 'customer_name', 'customer_town', 'customer_contact', 'customer_number', 'customer_order'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'user_id' => 'User ID',
            'area' => 'Area',
            'customer_name' => 'Customer Name',
            'customer_town' => 'Customer Town',
            'customer_contact' => 'Customer Contact',
            'customer_number' => 'Customer Number',
            'customer_order' => 'Customer Order',
            'visit_date' => 'Visit Date',
            'visit_time' => 'Visit Time',
            'odometer' => 'Odometer',
            'trip_distance' => 'Trip Distance',
            'comments' => 'Comments',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
