<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CustomerCategory;
use app\models\CustomerGroups;
use app\models\Transport;
use app\models\Reps;


/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fl_customer_name')->textInput() ?>

    <?= $form->field($model, 'fl_customer_addr1')->textInput() ?>

    <?= $form->field($model, 'fl_customer_addr2')->textInput() ?>

    <?= $form->field($model, 'fl_customer_town')->textInput() ?>

    <?= $form->field($model, 'fl_customer_province')->dropDownList([
            'FS' => 'Free State',
            'NC' => 'Northern Cape',
            'NW' => 'North West',
            'WC' => 'Western Cape',
            'GP' => 'Gauteng',
        ])?>
    
    <?= $form->field($model, 'fl_customer_country')->dropDownList([
            'ZA' => 'South Africa',
            'LS' => 'Lesotho',
        ])?>

    <?= $form->field($model, 'fl_customer_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fl_cust_email')->textInput() ?>
    
    <?= $form->field($model, 'fl_date_last_used')->textInput(['readonly'=>'true'])?>
    
    <?= $form->field($model, 'fl_cust_rep')->textInput() ?>

    <?= $form->field($model, 'fl_cust_group')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'fl_cust_group')->dropDownList(
         ArrayHelper::map(CustomerGroups::find()->all(),'fl_group_id','fl_group_name'),
            ['prompt' => 'Select Group']
        )?>

     <?= $form->field($model, 'fl_cust_category')->dropDownList(
         ArrayHelper::map(CustomerCategory::find()->all(),'fl_category_id','fl_category_name'),
         ['prompt' => 'Select Category']
        )?>

    <?= $form->field($model, 'fl_cust_accpac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_cust_active')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl_cust_pref_delivery')->textInput() ?>
    <?= $form->field($model, 'fl_cust_pref_delivery')->dropDownList(
         ArrayHelper::map(Transport::find()->all(),'fl_trans_id','fl_trans_name'),
         ['prompt' => 'Default Delivery'],
        )?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
