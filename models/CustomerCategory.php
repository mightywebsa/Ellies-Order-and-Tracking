<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_customer_category".
 *
 * @property int $fl_category_id Category ID
 * @property string $fl_category_name Customer Category Name
 */
class CustomerCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_customer_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_category_name'], 'required'],
            [['fl_category_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fl_category_id' => 'Fl Category ID',
            'fl_category_name' => 'Fl Category Name',
        ];
    }
}
