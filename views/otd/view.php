<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Otd */

$this->title = $model->fl_otd_id;
$this->params['breadcrumbs'][] = ['label' => 'Otds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="otd-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fl_otd_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fl_otd_id], [
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
            'fl_otd_id',
            'fl_otd_dec_serial',
            'fl_otd_smart_card',
            'fl_otd_date',
            'fl_otd_decoder_status',
            'fl_otd_received',
            'fl_otd_cust',
            'fl_otd_cust_id',
            'fl_otd_ra',
            'fl_otd_dec_cost',
            'fl_otd_dunno',
            'fl_otd_repl_inv',
            'fl_otd_grn',
            'fl_otd_claim_no',
            'fl_otd_comments',
            'fl_otd_rtt',
            'fl_otd_lnb_sn',
            'fl_otd_return_no',
            'fl_otd_credit_note',
        ],
    ]) ?>

</div>
