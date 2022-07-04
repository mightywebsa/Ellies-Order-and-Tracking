<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_reps".
 *
 * @property int $fl_rep_code Rep Code
 * @property string $fl_rep_name Reps Name
 * @property string $fl_rep_fullname Full Name
 * @property string|null $fl_rep_email Reps Email
 * @property int $fl_rep_active Is the Rep Active
 */
class Reps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_reps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_rep_code', 'fl_rep_name', 'fl_rep_fullname', 'fl_rep_active'], 'required'],
            [['fl_rep_code', 'fl_rep_active'], 'integer'],
            [['fl_rep_name', 'fl_rep_fullname',], 'string'],
            [['fl_rep_email'],'email'],
            [['fl_rep_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fl_rep_code' => 'RepCode',
            'fl_rep_name' => 'Short Name',
            'fl_rep_fullname' => 'Full Name',
            'fl_rep_email' => 'Email',
            'fl_rep_active' => 'Active',
        ];
    }
}
