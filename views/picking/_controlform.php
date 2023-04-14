<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Customers;
use app\models\Reps;

/* @var $this yii\web\View */
/* @var $model app\models\Picking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picking-form">
    <?php $form = ActiveForm::begin(); ?>
     <?= $form->field($model, 'fl_ps_no')->textInput(['maxlength' => true]) ?>
        <div class="row">
            <div class="col-md-6 col-sm-12">    
                <?= $form->field($model, 'fl_ps_control_in')->checkbox(['onclick' => 'setCurrentDateTime(this.id)']) ?>
            </div>
            <div class="col-md-6 col-sm-12">    
                <?= $form->field($model, 'fl_ps_control_in_date')->textInput(['readOnly' => true]) ?>
            </div>
        </div>
        <?= $form->field($model, 'fl_ps_inv_status')->textarea(['rows' => 6]) ?>
        <div class="row">
            <div class="col-md-6 col-sm-12">    
                <?= $form->field($model, 'fl_ps_control_out')->checkbox(['onclick' => 'setCurrentDateTime(this.id)']) ?>
            </div>
            <div class="col-md-6 col-sm-12">    
                <?= $form->field($model, 'fl_ps_control_out_date')->textInput(['readOnly' => true]) ?>
            </div>
        </div>   
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
