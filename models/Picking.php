<?php

namespace app\models;
use app\models\Reps;
use app\models\Customers;
use app\models\StorePersonnel;
use app\models\Transport;
use yii\helpers\ArrayHelper;



use Yii;

/**
 * This is the model class for table "tb_picking".
 *
 * @property int $fl_ps_id Picking Slip ID
 * @property string $fl_ps_no Picking Slip Number
 * @property string $fl_ps_order_no Picking Slip Order Number
 * @property string $fl_ps_company ellies or elsat
 * @property string $fl_ps_repcode Rep Code for Order
 * @property string $fl_ps_customer Picking Slip Customer
 * @property string $fl_ps_inv_date Date Time of Inv Scan
 * @property string $fl_ps_inv_del_date Delivery Date
 * @property string|null $fl_ps_inv_final_del_date Final Invoice Date
 * @property string|null $fl_ps_inv_status invoicing comments
 * @property int|null $fl_ps_control_in Scanned in at Control
 * @property string|null $fl_ps_control_in_date Date and time at Control
 * @property int|null $fl_ps_admin_in Was it scanned to admin
 * @property string|null $fl_ps_admin_in_date date and time it was scanned at admin
 * @property string|null $fl_ps_admin_status Status at Admin
 * @property int|null $fl_ps_admin_out time it was scanned out of admin
 * @property string|null $fl_ps_admin_out_date date scanned out of admin
 * @property int|null $fl_ps_control_out Was scanned back in to control
 * @property string|null $fl_ps_control_out_date date and time back at control
 * @property int|null $fl_ps_store_in Scanned in at store
 * @property string|null $fl_ps_store_in_date date and time at store
 * @property int|null $fl_ps_pickers scanned to pickers
 * @property string|null $fl_ps_pickers_date date and time sent to pickers
 * @property string|null $fl_ps_pickers_assigned picker assigned to picking slip
 * @property string|null $fl_ps_checkers_assigned Checker Assigned to PS
 * @property string|null $fl_ps_stock_lines Number of lines on the PS
 * @property int|null $fl_ps_stock_lines_picked Stock Lines Picked
 * @property int|null $fl_ps_store_out scanned out of store
 * @property string|null $fl_ps_store_out_date date and time out of store
 * @property string|null $fl_ps_store_edit Who edited the store record
 * @property int|null $fl_ps_control_check control checking
 * @property string|null $fl_ps_control_check_date date and time at noshane checking
 * @property string|null $fl_ps_control_check_comments noshane comments
 * @property int|null $fl_ps_cancel Is the Picking Slip cancelled
 * @property int|null $fl_ps_final_inv was it scanned back into invoicing
 * @property string|null $fl_ps_final_inv_date date time scanned back into invoice
 * @property string|null $fl_ps_final_inv_no Final Invoice number
 * @property float|null $fl_ps_inv_amount Invoice Amount
 * @property int|null $fl_ps_dispatch_in Dispatch in
 * @property string|null $fl_ps_dispatch_in_date Dispatch in date
 * @property string|null $fl_ps_dispatch_type Type of dispatch
 * @property string|null $fl_ps_dispatch_status Dispatch in status
 * @property int|null $fl_ps_dispatch_out Dispatch out
 * @property string|null $fl_ps_dispatch_out_date Dispatch out date
 * @property int|null $fl_ps_diamond_in Is it at Diamond
 * @property string|null $fl_ps_diamond_in_date Date in at diamond
 * @property int|null $fl_ps_diamond_method transport Method
 * @property int|null $fl_ps_diamond_out Scanned out at diamond
 * @property string|null $fl_ps_diamond_out_date Date out at diamond
 * @property string|null $fl_ps_delivery Delivery address
 * @property string|null $fl_ps_pod Proof of Delivery
 * @property string|null $fl_ps_pod_date POD Date and time
 * @property string|null $fl_ps_pod_reason GRN Number or other reason
 * @property int|null $fl_ps_complete Is the order now complete
 * @property int $fl_ps_diamondprint Has this record been printed
 * @property int $fl_ps_diamond_sameday Is this a Sameday Delivery
 * @property string|null $fl_ps_stock_status Status of stock items for Creditors
 * @property string|null $fl_ps_stock_date Date associated with status
 * @property string|null $fl_ps_stock_order Stock Order No
 * @property int|null $fl_ps_is_replacement Is Replacement Stock
 * @property float $fl_ps_amount Picking Slip amount
 * @property string|null $fl_ps_tripsheetno
 * @property float $fl_ps_tripsheetweight
 */
class Picking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_picking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fl_ps_no'],  'required'],
            [['fl_ps_customer', 'fl_ps_inv_status', 'fl_ps_admin_status', 'fl_ps_control_check_comments', 'fl_ps_dispatch_status', 'fl_ps_delivery', 'fl_ps_stock_status'], 'string'],
            [['fl_ps_inv_date', 'fl_ps_inv_del_date', 'fl_ps_inv_final_del_date', 'fl_ps_control_in_date', 'fl_ps_admin_in_date', 'fl_ps_admin_out_date', 'fl_ps_control_out_date', 'fl_ps_store_in_date', 'fl_ps_pickers_date', 'fl_ps_store_out_date', 'fl_ps_control_check_date', 'fl_ps_final_inv_date', 'fl_ps_dispatch_in_date', 'fl_ps_dispatch_out_date', 'fl_ps_diamond_in_date', 'fl_ps_diamond_out_date', 'fl_ps_pod_date', 'fl_ps_stock_date'], 'safe'],
            [['fl_ps_control_in', 'fl_ps_admin_in', 'fl_ps_admin_out', 'fl_ps_control_out', 'fl_ps_store_in', 'fl_ps_pickers', 'fl_ps_stock_lines_picked', 'fl_ps_store_out', 'fl_ps_control_check', 'fl_ps_cancel', 'fl_ps_final_inv', 'fl_ps_dispatch_in', 'fl_ps_dispatch_out', 'fl_ps_diamond_in', 'fl_ps_diamond_method', 'fl_ps_diamond_out', 'fl_ps_complete', 'fl_ps_diamondprint', 'fl_ps_diamond_sameday', 'fl_ps_is_replacement'], 'integer'],
            [['fl_ps_inv_amount', 'fl_ps_amount', 'fl_ps_tripsheetweight'], 'number'],
            [['fl_ps_no'], 'string', 'max' => 8],
            [['fl_ps_order_no', 'fl_ps_pickers_assigned', 'fl_ps_checkers_assigned', 'fl_ps_store_edit', 'fl_ps_dispatch_type'], 'string', 'max' => 20],
            [['fl_ps_company', 'fl_ps_pod', 'fl_ps_stock_order'], 'string', 'max' => 10],
            [['fl_ps_repcode'], 'string', 'max' => 4],
            [['fl_ps_stock_lines'], 'string', 'max' => 3],
            [['fl_ps_final_inv_no'], 'string', 'max' => 22],
            [['fl_ps_pod_reason'], 'string', 'max' => 30],
            [['fl_ps_tripsheetno'], 'string', 'max' => 12],
            [['fl_ps_no'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fl_ps_id' => 'ID',
            'fl_ps_no' => 'Picking Slip',
            'fl_ps_order_no' => 'Order No',
            'fl_ps_company' => 'Company',
            'fl_ps_repcode' => 'Repcode',
            'fl_ps_customer' => 'Customer',
            'fl_ps_inv_date' => 'Date Created',
            'fl_ps_inv_del_date' => 'Expected Delivery Date',
            'fl_ps_inv_final_del_date' => 'Final Delivery Date',
            'fl_ps_inv_status' => 'Comments',
            'fl_ps_control_in' => 'Control In',
            'fl_ps_control_in_date' => 'Control In Date',
            'fl_ps_admin_in' => 'Admin In',
            'fl_ps_admin_in_date' => 'Admin In Date',
            'fl_ps_admin_status' => 'Admin Status',
            'fl_ps_admin_out' => 'Admin Out',
            'fl_ps_admin_out_date' => 'Admin Out Date',
            'fl_ps_control_out' => 'Control Out',
            'fl_ps_control_out_date' => 'Control Out Date',
            'fl_ps_store_in' => 'Store In',
            'fl_ps_store_in_date' => 'Store In Date',
            'fl_ps_pickers' => 'Pickers',
            'fl_ps_pickers_date' => 'Pickers Date',
            'fl_ps_pickers_assigned' => 'Pickers Assigned',
            'fl_ps_checkers_assigned' => 'Checkers Assigned',
            'fl_ps_stock_lines' => 'Stock Lines',
            'fl_ps_stock_lines_picked' => 'Stock Lines Picked',
            'fl_ps_store_out' => 'Store Out',
            'fl_ps_store_out_date' => 'Store Out Date',
            'fl_ps_store_edit' => 'Store Edit',
            'fl_ps_control_check' => 'Control Check',
            'fl_ps_control_check_date' => 'Control Check Date',
            'fl_ps_control_check_comments' => 'Control Check Comments',
            'fl_ps_cancel' => 'Cancelled',
            'fl_ps_final_inv' => 'Invoiced',
            'fl_ps_final_inv_date' => 'Date Invoiced',
            'fl_ps_final_inv_no' => 'Invoice No',
            'fl_ps_inv_amount' => 'Invoiced Amount',
            'fl_ps_dispatch_in' => 'Dispatch In',
            'fl_ps_dispatch_in_date' => 'Dispatch In Date',
            'fl_ps_dispatch_type' => 'Dispatch Type',
            'fl_ps_dispatch_status' => 'Dispatch Status',
            'fl_ps_dispatch_out' => 'Dispatch Out',
            'fl_ps_dispatch_out_date' => 'Dispatch Out Date',
            'fl_ps_diamond_in' => 'Delivery Dept In',
            'fl_ps_diamond_in_date' => 'Delivery Dept In Date',
            'fl_ps_diamond_method' => 'Delivery Method',
            'fl_ps_diamond_out' => 'Delivery Dept Out',
            'fl_ps_diamond_out_date' => 'Delivery Dept Out Date',
            'fl_ps_delivery' => 'Delivery',
            'fl_ps_pod' => 'POD',
            'fl_ps_pod_date' => 'POD Date',
            'fl_ps_pod_reason' => 'POD Reason',
            'fl_ps_complete' => 'Complete',
            'fl_ps_diamondprint' => 'Diamondprint',
            'fl_ps_diamond_sameday' => 'Diamond Sameday',
            'fl_ps_stock_status' => 'Stock Status',
            'fl_ps_stock_date' => 'Stock Date',
            'fl_ps_stock_order' => 'Stock Order',
            'fl_ps_is_replacement' => 'Is Replacement',
            'fl_ps_amount' => 'Picking Slip Amount',
            'fl_ps_tripsheetno' => 'Tripsheet No',
            'fl_ps_tripsheetweight' => 'Tripsheet Weight',
        ];
    }
    
    public function getRep($id){
        $rep = Reps::find()->where(['fl_rep_code' => $id])->one();
        return $rep['fl_rep_name'];
    }
    
    public static function yes_no($value){
        if($value == 1){
            return "Yes";
        }else{
            return "No";
        }
    }
            
}

