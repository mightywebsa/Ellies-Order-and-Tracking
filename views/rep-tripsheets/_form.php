<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

use app\models\Cities;

$areas = Cities::find()->select(['area'])->distinct('area')->all();
$areasList = ArrayHelper::map($areas,'area','area');

$customers = \app\models\Customers::find()->select(['fl_customer_id','fl_customer_name'])->orderBy('fl_customer_name')->all();
$customerList = ArrayHelper::map($customers, 'fl_customer_id' ,'fl_customer_name');

/* @var $this yii\web\View */
/* @var $model app\models\RepTripsheets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rep-tripsheets-form">    
    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]); ?>

        <?= $form->field($model, 'date')->textInput([
            'value' => date('Y-m-d H:i:s'),
            'readonly' => true,              
            ]) ?>         

        <?= $form->field($model, 'user_id')->hiddenInput([
            'value' => Yii::$app->user->identity->id,
            'readonly' => true,  
            'label' => false

            ])->label(false) ?>

        <?= $form->field($model, 'area')->widget(Select2::classname(),
            [
                'data' => $areasList,
                'options' => ['placeholder' => 'Select an area...', 'id' => 'area'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])
        ?>
    
        <?= $form->field($model, 'customer_town')->widget(DepDrop::classname(),
            [
                'options'=>['id'=>'customer_town'],                
                'pluginOptions'=>[
                    'depends'=>['area'],
                    'placeholder'=>'Select City...',
                    'url' => Url::to(['cities']),
                ]
            ])
        ?>
        
        <?= $form->field($model, 'customer_name')->widget(Select2::classname(),
            [
                'data' => $customerList,
                'options' => ['placeholder' => 'Select an customer...', 'id' => 'fl_customer_id'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])
        ?>
        

        <?= $form->field($model, 'customer_contact')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'customer_number')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'customer_order')->textInput(['maxlength' => true]) ?>
    
    <div class='row'>
        <div class='col-md-6'><?= $form->field($model, 'visit_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter date ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'autoclose' => true
            ]
        ]);?>
        </div>
        <div class='col-md-6'><?= $form->field($model, 'visit_time')->widget(TimePicker::classname(), [
            'options' => ['placeholder' => 'Enter time ...'],
            'pluginOptions' => [
                'showSeconds' => true,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
                'autoclose' => true
            ]
        ]);?>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-6'><?= $form->field($model, 'odometer')->textInput(['maxlength' => true]) ?>        </div>
        <div class='col-md-6'><?= $form->field($model, 'trip_distance')->textInput(['maxlength' => true]) ?> </div>
    </div>
        
        
    

        <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>


</div>
