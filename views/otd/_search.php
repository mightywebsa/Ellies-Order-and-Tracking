<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OtdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="otd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fl_otd_id') ?>

    <?= $form->field($model, 'fl_otd_dec_serial') ?>

    <?= $form->field($model, 'fl_otd_smart_card') ?>

    <?= $form->field($model, 'fl_otd_date') ?>

    <?= $form->field($model, 'fl_otd_decoder_status') ?>

    <?php // echo $form->field($model, 'fl_otd_received') ?>

    <?php // echo $form->field($model, 'fl_otd_cust') ?>

    <?php // echo $form->field($model, 'fl_otd_cust_id') ?>

    <?php // echo $form->field($model, 'fl_otd_ra') ?>

    <?php // echo $form->field($model, 'fl_otd_dec_cost') ?>

    <?php // echo $form->field($model, 'fl_otd_dunno') ?>

    <?php // echo $form->field($model, 'fl_otd_repl_inv') ?>

    <?php // echo $form->field($model, 'fl_otd_grn') ?>

    <?php // echo $form->field($model, 'fl_otd_claim_no') ?>

    <?php // echo $form->field($model, 'fl_otd_comments') ?>

    <?php // echo $form->field($model, 'fl_otd_rtt') ?>

    <?php // echo $form->field($model, 'fl_otd_lnb_sn') ?>

    <?php // echo $form->field($model, 'fl_otd_return_no') ?>

    <?php // echo $form->field($model, 'fl_otd_credit_note') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
