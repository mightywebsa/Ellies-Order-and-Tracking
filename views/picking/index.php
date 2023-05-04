<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Reps;
use app\models\Customers;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PickingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Picking Slips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picking-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('New Picking Slip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
       'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'striped' => true,
        'hover' => true,         
        'panel' => ['type' => 'primary', 'heading' => 'Picking Slips'],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'columns' => [            
            ['label' => 'Picking Slip',
               'attribute' => 'fl_ps_no',
               'format'=>'raw',
               'value' => function($data){                  
               $url = Yii::$app->urlManager->createUrl('picking/view').'&id='.$data->fl_ps_id;               
               return Html::a(Html::encode($data->fl_ps_no), $url, ['title' => 'View']);},
               
            ],
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
                    if(is_numeric($data->fl_ps_customer)){
                    $customer = Customers::find()
                            ->where(['fl_customer_id' => $data->fl_ps_customer])
                            ->andWhere(['fl_cust_active'=>'on'])->one();                                       
                            return $customer->fl_customer_name;
                    }else{
                        
                            return $data->fl_ps_customer;
                    }
                }             
            ],
            'fl_ps_inv_date',
            'fl_ps_inv_amount',            
            'fl_ps_amount',
            [
              'class' => '\kartik\grid\ActionColumn',
              'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>',
                'data-confirm' => 'Are you sure you want to delete this item?']
            ]
        ],
    ]); 
?>


</div>
