<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PickingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fl_ps_id') ?>

    <?= $form->field($model, 'fl_ps_no') ?>

    <?= $form->field($model, 'fl_ps_order_no') ?>

    <?= $form->field($model, 'fl_ps_company') ?>

    <?= $form->field($model, 'fl_ps_repcode') ?>

    <?php // echo $form->field($model, 'fl_ps_customer') ?>

    <?php // echo $form->field($model, 'fl_ps_inv_date') ?>

    <?php // echo $form->field($model, 'fl_ps_inv_del_date') ?>

    <?php // echo $form->field($model, 'fl_ps_inv_final_del_date') ?>

    <?php // echo $form->field($model, 'fl_ps_inv_status') ?>

    <?php // echo $form->field($model, 'fl_ps_control_in') ?>

    <?php // echo $form->field($model, 'fl_ps_control_in_date') ?>

    <?php // echo $form->field($model, 'fl_ps_admin_in') ?>

    <?php // echo $form->field($model, 'fl_ps_admin_in_date') ?>

    <?php // echo $form->field($model, 'fl_ps_admin_status') ?>

    <?php // echo $form->field($model, 'fl_ps_admin_out') ?>

    <?php // echo $form->field($model, 'fl_ps_admin_out_date') ?>

    <?php // echo $form->field($model, 'fl_ps_control_out') ?>

    <?php // echo $form->field($model, 'fl_ps_control_out_date') ?>

    <?php // echo $form->field($model, 'fl_ps_store_in') ?>

    <?php // echo $form->field($model, 'fl_ps_store_in_date') ?>

    <?php // echo $form->field($model, 'fl_ps_pickers') ?>

    <?php // echo $form->field($model, 'fl_ps_pickers_date') ?>

    <?php // echo $form->field($model, 'fl_ps_pickers_assigned') ?>

    <?php // echo $form->field($model, 'fl_ps_checkers_assigned') ?>

    <?php // echo $form->field($model, 'fl_ps_stock_lines') ?>

    <?php // echo $form->field($model, 'fl_ps_stock_lines_picked') ?>

    <?php // echo $form->field($model, 'fl_ps_store_out') ?>

    <?php // echo $form->field($model, 'fl_ps_store_out_date') ?>

    <?php // echo $form->field($model, 'fl_ps_store_edit') ?>

    <?php // echo $form->field($model, 'fl_ps_control_check') ?>

    <?php // echo $form->field($model, 'fl_ps_control_check_date') ?>

    <?php // echo $form->field($model, 'fl_ps_control_check_comments') ?>

    <?php // echo $form->field($model, 'fl_ps_cancel') ?>

    <?php // echo $form->field($model, 'fl_ps_final_inv') ?>

    <?php // echo $form->field($model, 'fl_ps_final_inv_date') ?>

    <?php // echo $form->field($model, 'fl_ps_final_inv_no') ?>

    <?php // echo $form->field($model, 'fl_ps_inv_amount') ?>

    <?php // echo $form->field($model, 'fl_ps_dispatch_in') ?>

    <?php // echo $form->field($model, 'fl_ps_dispatch_in_date') ?>

    <?php // echo $form->field($model, 'fl_ps_dispatch_type') ?>

    <?php // echo $form->field($model, 'fl_ps_dispatch_status') ?>

    <?php // echo $form->field($model, 'fl_ps_dispatch_out') ?>

    <?php // echo $form->field($model, 'fl_ps_dispatch_out_date') ?>

    <?php // echo $form->field($model, 'fl_ps_diamond_in') ?>

    <?php // echo $form->field($model, 'fl_ps_diamond_in_date') ?>

    <?php // echo $form->field($model, 'fl_ps_diamond_method') ?>

    <?php // echo $form->field($model, 'fl_ps_diamond_out') ?>

    <?php // echo $form->field($model, 'fl_ps_diamond_out_date') ?>

    <?php // echo $form->field($model, 'fl_ps_delivery') ?>

    <?php // echo $form->field($model, 'fl_ps_pod') ?>

    <?php // echo $form->field($model, 'fl_ps_pod_date') ?>

    <?php // echo $form->field($model, 'fl_ps_pod_reason') ?>

    <?php // echo $form->field($model, 'fl_ps_complete') ?>

    <?php // echo $form->field($model, 'fl_ps_diamondprint') ?>

    <?php // echo $form->field($model, 'fl_ps_diamond_sameday') ?>

    <?php // echo $form->field($model, 'fl_ps_stock_status') ?>

    <?php // echo $form->field($model, 'fl_ps_stock_date') ?>

    <?php // echo $form->field($model, 'fl_ps_stock_order') ?>

    <?php // echo $form->field($model, 'fl_ps_is_replacement') ?>

    <?php // echo $form->field($model, 'fl_ps_amount') ?>

    <?php // echo $form->field($model, 'fl_ps_tripsheetno') ?>

    <?php // echo $form->field($model, 'fl_ps_tripsheetweight') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
