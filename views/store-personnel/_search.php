<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StorePersonnelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-personnel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fl_sto_id') ?>

    <?= $form->field($model, 'fl_sto_name') ?>

    <?= $form->field($model, 'fl_sto_position') ?>

    <?= $form->field($model, 'fl_sto_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
