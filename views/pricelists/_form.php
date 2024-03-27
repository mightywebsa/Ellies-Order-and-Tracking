<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pricelists */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pricelists-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pricelist_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_base_price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
