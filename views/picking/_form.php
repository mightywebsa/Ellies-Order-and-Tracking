<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Customers;
use app\models\Reps;

/* @var $this yii\web\View */
/* @var $model app\models\Picking */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
    function getaddress()
  {
    $accno = (document.getElementById("fl_ps_customer").value);
    
    //AJAX function to add or edit user in database
        if(window.XMLHttpRequest)
        {//code for IE7+, FF, Chrome, Opera, Safari
                xmlhttp2 = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
                xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp2.onreadystatechange=function()
                {
                        if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
                        {
                                alert(xmlhttp2.responseText);
                        }
                }
        xmlhttp2.open("GET", "accounts.php?accno=" + $accno,true);
        xmlhttp2.send();
  }
  
  function setCurrentDateTime() {
    var checkbox = document.getElementById("picking-fl_ps_final_inv");
    var textField = document.getElementById("picking-fl_ps_final_inv_date");

    if (checkbox.checked) {
      var now = new Date();
      var formattedDateTime = now.toISOString().replace(/T/, ' ').replace(/\..+/, '');;
      textField.value = formattedDateTime;
    } else {
      textField.value = "";
    }
  }
</script>

<div class="picking-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'fl_ps_no')->textInput(['maxlength' => true]) ?>    
        </div>
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'fl_ps_company')->dropDownList(
                    ['Ellies'=>'Ellies',
                    'Elsat'=>'Elsat'],
                    ['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'fl_ps_repcode')->dropDownList(Reps::find()
                    ->select('fl_rep_name')
                    ->where(['fl_rep_active'=>1])
                    ->indexby('fl_rep_code')
                    ->column(),
                    ['prompt'=>'Select Rep...']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">            
            <?= $form->field($model, 'fl_ps_customer')->widget(Select2::classname(),
                    [
                        'data' => ArrayHelper::map(Customers::find()
                                ->where(['fl_cust_active' => 'on'])
                                ->orderBy('fl_customer_name')
                                ->asArray()
                                ->all(),'fl_customer_id',
                                function($model){
                                    $customers = Customers::find()->where(['fl_customer_id'=>$model['fl_customer_id']])->one();
                                    return $customers['fl_customer_name'];                            
                                }),
                        
                        'options' => ['placeholder' => 'Please choose a customer'],
                        'pluginOptions' => [
                        'allowClear' => true, 
                        ],
                    ])
            ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <button class="btn btn-success" onclick='getaddress()'>Address</button>
        </div>
    </div>
    <?= $form->field($model, 'fl_ps_inv_date')->textInput(['readOnly'=>true]) ?>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'fl_ps_inv_del_date')->input('date')?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'fl_ps_inv_final_del_date')->input('date')?>
        </div>
    </div>
    <?= $form->field($model, 'fl_ps_amount')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'fl_ps_inv_status')->textarea(['rows' => 6]) ?>    

    <?= $form->field($model, 'fl_ps_cancel')->checkbox() ?>

    <?= $form->field($model, 'fl_ps_final_inv')->checkbox(['onclick' => 'setCurrentDateTime()']) ?>

    <?= $form->field($model, 'fl_ps_final_inv_date')->textInput(['readOnly'=>true]) ?>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'fl_ps_final_inv_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'fl_ps_inv_amount')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?= $form->field($model, 'fl_ps_is_replacement')->checkbox() ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
