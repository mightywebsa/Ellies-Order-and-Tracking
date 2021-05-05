<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_transport".
 *
 * @property int $fl_trans_id Transport ID
 * @property string $fl_trans_name Transport Company
 * @property string|null $fl_trans_addr1 Address Line 1
 * @property string|null $fl_trans_addr2 Address Line 2
 * @property string|null $fl_trans_phone Contact No
 * @property string|null $fl_trans_fax Fax No
 * @property string|null $fl_trans_cell Cell No
 * @property string|null $fl_trans_code Code
 * @property int $fl_trans_active
 */
class Transport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_transport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_trans_name', 'fl_trans_active'], 'required'],
            [['fl_trans_addr1', 'fl_trans_addr2'], 'string'],
            [['fl_trans_active'], 'integer'],
            [['fl_trans_name'], 'string', 'max' => 30],
            [['fl_trans_phone', 'fl_trans_fax', 'fl_trans_cell'], 'string', 'max' => 14],
            [['fl_trans_code'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fl_trans_id' => 'Fl Trans ID',
            'fl_trans_name' => 'Fl Trans Name',
            'fl_trans_addr1' => 'Fl Trans Addr1',
            'fl_trans_addr2' => 'Fl Trans Addr2',
            'fl_trans_phone' => 'Fl Trans Phone',
            'fl_trans_fax' => 'Fl Trans Fax',
            'fl_trans_cell' => 'Fl Trans Cell',
            'fl_trans_code' => 'Fl Trans Code',
            'fl_trans_active' => 'Fl Trans Active',
        ];
    }
}
