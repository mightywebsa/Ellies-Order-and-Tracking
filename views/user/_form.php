<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php 
    
    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>    
    
    <?= $form->field($model, 'company')->dropDownList(['Ellies Bloemfontein' => 'Ellies Bloemfontein',
        'Ellies JHB' => 'Ellies JHB',
        'Other' => 'Other',
        ])
    ?>

    <?= $form->field($model, 'user_level')->dropDownList([
        0 => 'Admin',
        1 => 'Manager',
        2 => 'User',
        9 => 'Installer',
    ]) ?>
    
     <?= $form->field($model, 'user_group')->dropDownList([
        0 => 'All',
        1 => 'Invoice',
        2 => 'Control',
        3 => 'Admin',
        4 => 'Store',
        5 => 'Dispatch',
        6 => 'Delivery',
        7 => 'PODs',
        8 => 'Other',
        9 => 'Reports',
    ]) ?>

    <?= $form->field($model, 'department')->dropDownList([
        'IT' => 'IT',
        'Store' => 'Store',
        'Admin' => 'Admin',
        'All' => 'Management',
        'ELSAT' => 'Elsat',
        'Invoicing' => 'Invoicing',
        'Renewable' => 'Renewable',
        'Sales' => 'Sales',
    ]) ?>

    <?= $form->field($model, 'user_manager')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manger_email')->textInput(['maxlength' => true, 'email'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
