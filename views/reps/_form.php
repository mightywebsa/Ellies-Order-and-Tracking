<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reps */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reps-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fl_rep_code')->textInput() ?>

    <?= $form->field($model, 'fl_rep_name')->textInput() ?>

    <?= $form->field($model, 'fl_rep_fullname')->textInput() ?>

    <?= $form->field($model, 'fl_rep_email')->textInput() ?>
    
    <?= $form->field($model, 'fl_rep_active')->dropDownList([1 => 'Yes',
        0 => 'No',
        ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
