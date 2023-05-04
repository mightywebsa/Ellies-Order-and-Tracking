<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Reps;
use app\models\Customers;

/* @var $this yii\web\View */
/* @var $model app\models\Picking */

$this->title = "PS No: ".$model->fl_ps_no;
$this->params['breadcrumbs'][] = ['label' => 'Picking Slip', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="picking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Control', ['control', 'id' => $model->fl_ps_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Admin', ['admin', 'id' => $model->fl_ps_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Store', ['store', 'id' => $model->fl_ps_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Dispatch', ['dispatch', 'id' => $model->fl_ps_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deliveries', ['delivery', 'id' => $model->fl_ps_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('POD', ['pod', 'id' => $model->fl_ps_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fl_ps_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fl_ps_no',            
            'fl_ps_company',
            [
                'label' => 'Rep',
                'attribute' => 'fl_ps_repcode',
                'format' => 'raw',
                'value' => function($data){
                   $rep = Reps::find()->where(['fl_rep_code' => $data->fl_ps_repcode])->one();
                   return $rep->fl_rep_name;
                }             
            ],
            [
                'label' => 'Customer',
                'attribute' => 'fl_ps_customer',
                'format' => 'raw',
                'value' => function($data){
                   $customer = Customers::find()->where(['fl_customer_id' => $data->fl_ps_customer])->one();                   
                   return $customer->fl_customer_name;
                }             
            ],
            'fl_ps_inv_date',
            'fl_ps_inv_del_date',
            'fl_ps_inv_final_del_date',
            'fl_ps_inv_status:ntext',
            [
                'label' => 'Was Cancelled?',
                'attribute' => 'fl_ps_cancel',
                'format' => 'raw',
                'value' => \app\models\Picking::yes_no($model->fl_ps_cancel),
            ],            
            [
                'label' => 'Was Invoiced?',
                'attribute' => 'fl_ps_final_inv',
                'format' => 'raw',
                'value' => \app\models\Picking::yes_no($model->fl_ps_final_inv),
            ],            
            
            'fl_ps_final_inv_date',
            'fl_ps_final_inv_no',            
            [
              'label' => 'Picking Slip Total',
                'attribute' => 'fl_ps_amount',
                'format' => 'raw',
                'value' =>Yii::$app->formatter->asCurrency($model->fl_ps_amount)  
            ],
            [
              'label' => 'Invoice Total',
                'attribute' => 'fl_ps_inv_amount',
                'format' => 'raw',
                'value' =>Yii::$app->formatter->asCurrency($model->fl_ps_inv_amount)  
            ],            
            'fl_ps_dispatch_in_date',
            'fl_ps_dispatch_type',                        
            'fl_ps_dispatch_out_date',            
            'fl_ps_diamond_in_date',
            [
                'label' => 'Delivery Method',
                'attribute' => 'fl_ps_diamond_method',
                'format' => 'raw',
                'value' => function($data){
                    if($data->fl_ps_diamond_method != 0){
                   $delivery = app\models\Transport::find()->where(['fl_trans_id' => $data->fl_ps_diamond_method])->one();                   
                   return $delivery->fl_trans_name;
                    }else{
                        return "Not Set";
                    }
                        
                }
            ],                      
            'fl_ps_diamond_out_date',            
            'fl_ps_pod',
            'fl_ps_pod_date',
            'fl_ps_pod_reason',
            'fl_ps_complete',            
        ],
    ]) ?>

</div>
