<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'equipId') ?>

    <?= $form->field($model, 'equipType') ?>

    <?= $form->field($model, 'equipBrand') ?>

    <?= $form->field($model, 'equipModel') ?>

    <?= $form->field($model, 'equipCPU') ?>

    <?php // echo $form->field($model, 'equipRAM') ?>

    <?php // echo $form->field($model, 'equipHDD') ?>

    <?php // echo $form->field($model, 'equipScreen') ?>

    <?php // echo $form->field($model, 'equipUser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
