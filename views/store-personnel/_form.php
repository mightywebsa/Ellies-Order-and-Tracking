<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StorePersonnel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-personnel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fl_sto_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_sto_position')->dropDownList(
            [   
                'Picker'=>'Picker',
                'Checker'=>'Checker',
                'Dispatch'=>'Dispatch',
                'Invoicing'=>'Invoicing',
                'Office'=>'Office',
                'Cancelled'=>'Cancelled',
                'Driver'=>'Driver',
                'Counter'=>'Counter',
                'Receiving'=>'Receiving',
                'Rep'=>'Rep',],
            
            ['maxlength' => true]) ?>

    
    <?= $form->field($model, 'fl_sto_active')->dropDownList(['0' => 'No', '1'=>'Yes'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
