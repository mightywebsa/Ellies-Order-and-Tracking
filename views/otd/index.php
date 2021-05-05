<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OtdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'On The Dot';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="otd-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('New OTD', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'fl_otd_id',
            'fl_otd_dec_serial',
            'fl_otd_smart_card',
            'fl_otd_date',
            'fl_otd_decoder_status',
            //$this->getCustomer(),
            //'fl_otd_received',
            //'fl_otd_cust',
            //'fl_otd_cust_id',
            //'fl_otd_ra',
            //'fl_otd_dec_cost',
            //'fl_otd_dunno',
            //'fl_otd_repl_inv',
            //'fl_otd_grn',
            //'fl_otd_claim_no',
            //'fl_otd_comments',
            //'fl_otd_rtt',
            //'fl_otd_lnb_sn',
            //'fl_otd_return_no',
            //'fl_otd_credit_note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
