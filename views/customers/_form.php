<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fl_customer_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fl_customer_addr1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fl_customer_addr2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fl_customer_town')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fl_customer_province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_customer_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_customer_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fl_cust_email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fl_date_last_used')->textInput() ?>

    <?= $form->field($model, 'fl_cust_rep')->textInput() ?>

    <?= $form->field($model, 'fl_cust_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_cust_category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_cust_accpac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_cust_active')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_cust_pref_delivery')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
