<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$areas = $model::find()->select(['area'])->distinct('area')->all();
$areasList = ArrayHelper::map($areas,'area','area');
        

/* @var $this yii\web\View */
/* @var $model app\models\Cities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cities-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'area')->widget(Select2::classname(),
            [
                'data' => $areasList,
                'options' => ['placeholder' => 'Select an area...', 'id' => 'area'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])
        ?>    
    <?= $form->field($model, 'country')->widget(Select2::classname(),
            [
                'data' => ['South Africa' => 'South Africa', 'Lesotho' => 'Lesotho']
                
            ])
    ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
