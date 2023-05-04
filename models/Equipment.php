<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $equipId
 * @property string $equipType Equipment Type (eg. Desktop, Laptop)
 * @property string $equipBrand
 * @property string $equipModel
 * @property string $equipCPU
 * @property string $equipRAM
 * @property string $equipHDD
 * @property string $equipScreen
 * @property string $equipUser
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipType', 'equipBrand', 'equipModel', 'equipCPU', 'equipRAM', 'equipHDD', 'equipScreen', 'equipPCName', 'equipUser', 'equipStatus' ,'equipOS','equipMSOffice','equipAssetTag'], 'string', 'max' => 50],
            [['equipSerial','equipNotes'],'string', 'max' => 255],
            [['equipDate'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'equipId' => 'Hardware ID',
            'equipType' => 'Hardware Type',
            'equipBrand' => 'Brand',
            'equipModel' => 'Model',
            'equipCPU' => 'CPU',
            'equipRAM' => 'RAM',
            'equipHDD' => 'Harddrive',
            'equipScreen' => 'Screens',
            'equipPCName' => 'PC Name',
            'equipUser' => 'Current User',
            'equipStatus' => 'Current Status',
            'equipSerial' => 'Serial No',
            'equipOS' => 'Operating System',
            'equipMSOffice' => 'MS Office Version',
            'equipNotes' => 'Notes',
            'equipDate' => 'Last edit',
            'equipAdded' => 'Date Added',
            'equipAssetTag' => 'Ellies Asset Tag',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
