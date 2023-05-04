<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepTripsheetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My trips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rep-tripsheets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('New Trip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'striped' => true,
        'hover' => true,         
        'panel' => ['type' => 'primary', 'heading' => 'Trips'],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'columns' => [ 
            ['class' => 'yii\grid\SerialColumn'],           
            'customer_name',
            'customer_town',
            'customer_contact',
            'customer_number',
            'customer_order',
            'visit_date',
            'visit_time',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
