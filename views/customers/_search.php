<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fl_customer_id') ?>

    <?= $form->field($model, 'fl_customer_name') ?>

    <?= $form->field($model, 'fl_customer_addr1') ?>

    <?= $form->field($model, 'fl_customer_addr2') ?>

    <?= $form->field($model, 'fl_customer_town') ?>

    <?php // echo $form->field($model, 'fl_customer_province') ?>

    <?php // echo $form->field($model, 'fl_customer_country') ?>

    <?php // echo $form->field($model, 'fl_customer_comment') ?>

    <?php // echo $form->field($model, 'fl_cust_email') ?>

    <?php // echo $form->field($model, 'fl_date_last_used') ?>

    <?php // echo $form->field($model, 'fl_cust_rep') ?>

    <?php // echo $form->field($model, 'fl_cust_group') ?>

    <?php // echo $form->field($model, 'fl_cust_category') ?>

    <?php // echo $form->field($model, 'fl_cust_accpac') ?>

    <?php // echo $form->field($model, 'fl_cust_active') ?>

    <?php // echo $form->field($model, 'fl_cust_pref_delivery') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
