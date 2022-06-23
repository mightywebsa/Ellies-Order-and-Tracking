<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Otd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="otd-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fl_otd_dec_serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_smart_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_date')->textInput() ?>

    <?= $form->field($model, 'fl_otd_decoder_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_received')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_cust')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_cust_id')->textInput() ?>

    <?= $form->field($model, 'fl_otd_ra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_dec_cost')->textInput() ?>

    <?= $form->field($model, 'fl_otd_dunno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_repl_inv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_grn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_claim_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_comments')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_rtt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_lnb_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_return_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_otd_credit_note')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
