<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('New Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'fl_cust_accpac',
            //'fl_customer_id',
            'fl_customer_name',
            'fl_customer_addr1',
            //'fl_customer_addr2',
            'fl_customer_town',
            //'fl_customer_province',
            //'fl_customer_country',
            //'fl_customer_comment:ntext',
            'fl_cust_email:email',
            'fl_date_last_used',
            'fl_cust_rep',
            //'fl_cust_group',
            //'fl_cust_category',
            //'fl_cust_accpac',
            //'fl_cust_active',
            //'fl_cust_pref_delivery',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
