<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_store".
 *
 * @property int $fl_sto_id Store Person ID
 * @property string $fl_sto_name Store Person Name
 * @property string $fl_sto_position picker or checker
 * @property int $fl_sto_active
 */
class StorePersonnel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_sto_name', 'fl_sto_position', 'fl_sto_active'], 'required'],
            [['fl_sto_active'], 'integer'],
            [['fl_sto_name'], 'string', 'max' => 20],
            [['fl_sto_position'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fl_sto_id' => 'Store ID',
            'fl_sto_name' => 'Name',
            'fl_sto_position' => 'Position',
            'fl_sto_active' => 'Is Active',
        ];
    }
}
