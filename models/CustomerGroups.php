<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_customer_groups".
 *
 * @property int $fl_group_id Group ID
 * @property string $fl_group_name Group Name
 */
class CustomerGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_customer_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_group_name'], 'required'],
            [['fl_group_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fl_group_id' => 'Fl Group ID',
            'fl_group_name' => 'Fl Group Name',
        ];
    }
}
