<?php

use yii\helpers\Html;
use kartik\grid\GridView;

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
        <div class='col-md-6'>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pjax'=>true,
                'striped' => true,
                'hover' => true,         
                'panel' => ['type' => 'primary', 'heading' => 'Trips'],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                'columns' => [                       
                    'customer_name',
                    'customer_town',
                    'customer_contact',
                    'area',                    
                ],
            ]); ?>
        </div>
        <div class='col-md-6'>
            <?php //var_dump($this);?>
        </div>
    </div>


</div>
