<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Picking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picking-form">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'fl_ps_no')->textInput(['maxlength' => true, 'readonly'=>true]) ?>
        <div class="row">
            <div class="col-md-6 col-sm-12">    
                <?= $form->field($model, 'fl_ps_admin_in')->checkbox() ?>
            </div>
            <div class="col-md-6 col-sm-12">    
                <?= $form->field($model, 'fl_ps_admin_in_date')->textInput() ?>
            </div>
        </div>
        <?= $form->field($model, 'fl_ps_inv_status')->textarea(['rows' => 6]) ?>
        <div class="row">
            <div class="col-md-6 col-sm-12">    
                <?= $form->field($model, 'fl_ps_admin_out')->checkbox() ?>
            </div>
            <div class="col-md-6 col-sm-12">    
                <?= $form->field($model, 'fl_ps_admin_out_date')->textInput() ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
