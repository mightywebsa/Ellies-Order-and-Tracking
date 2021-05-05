<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transport-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fl_trans_id') ?>

    <?= $form->field($model, 'fl_trans_name') ?>

    <?= $form->field($model, 'fl_trans_addr1') ?>

    <?= $form->field($model, 'fl_trans_addr2') ?>

    <?= $form->field($model, 'fl_trans_phone') ?>

    <?php // echo $form->field($model, 'fl_trans_fax') ?>

    <?php // echo $form->field($model, 'fl_trans_cell') ?>

    <?php // echo $form->field($model, 'fl_trans_code') ?>

    <?php // echo $form->field($model, 'fl_trans_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
