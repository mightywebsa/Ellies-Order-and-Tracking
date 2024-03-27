<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Customers;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepTripsheetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Summary trips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rep-tripsheets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
    </p>
    <div class='row'>
        <div class='col-md-9'>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pjax'=>true,
                'pjaxSettings'=>[
                    'neverTimeout'=>true,                
                ],
                
                
                
                
                'striped' => true,
                'hover' => true,         
                'panel' => ['type' => 'primary', 'heading' => 'Trips'],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                'showPageSummary' => true,
                'columns' => [
                    [
                        'attribute' => 'customer_name',
                        'format' => 'raw',
                        'value' => function($model){
                          $customerName = Customers::findone($model->customer_name)->fl_customer_name;
                          return $customerName;
                        },            

                      ],    
                    'visit_date',
                        [   
                            'class' => '\kartik\grid\DataColumn',
                            'attribute' => 'trip_distance',
                        ],
                    'customer_town',
                    'customer_contact',    
                     
                ],
            ]); ?>
        </div>
        <div class='col-md-3'>
            <?php //var_dump($this);?>
        </div>
    </div>


</div>
