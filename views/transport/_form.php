<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transport-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fl_trans_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_trans_addr1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fl_trans_addr2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fl_trans_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_trans_fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_trans_cell')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_trans_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_trans_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
