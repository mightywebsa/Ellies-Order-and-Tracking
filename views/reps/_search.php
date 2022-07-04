<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RepsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reps-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fl_rep_code') ?>

    <?= $form->field($model, 'fl_rep_name') ?>

    <?= $form->field($model, 'fl_rep_fullname') ?>

    <?= $form->field($model, 'fl_rep_email') ?>

    <?= $form->field($model, 'fl_rep_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
