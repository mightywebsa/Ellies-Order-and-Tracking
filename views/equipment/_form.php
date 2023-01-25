<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'equipType')->dropDownList(['Laptop' => 'Laptop',
        'Desktop' => 'Desktop',        
        'Server' => 'Server',
        'Virtual' => 'Virtual',
        'Printer' => 'Printer',
        'Tablet' => 'Tablet',
        'Mobile' => 'Mobile',
        'Other' => 'Other',
        ]) ?>
    
    <?= $form->field($model, 'equipBrand')->dropDownList([
        'Acer' => 'Acer',
        'ASRock' => 'ASRock',
        'Asus' => 'Asus',
        'Compaq' => 'Compaq',
        'Dell' => 'Dell',        
        'Gigabyte' => 'Gigabyte',        
        'HP' => 'HP',
        'Intel' => 'Intel',
        'Lenovo' => 'Lenovo',
        'MSI' => 'MSI',        
        'Other' => 'Other',
        ]) ?>

    <?= $form->field($model, 'equipModel')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'equipSerial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equipCPU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equipRAM')->dropDownList([
        '1 Gig' => '1 Gig',
        '2 Gig' => '2 Gig',
        '4 Gig' => '4 Gig',
        '8 Gig' => '8 Gig',
        '16 Gig' => '16 Gig',
        '32 Gig' => '32 Gig',
        '64 Gig' => '64 Gig',],)
        ?>
    

    <?= $form->field($model, 'equipHDD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equipScreen')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'equipPCName')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'equipOS')->dropDownList([
        'Win 10 SLE' => 'Win 10 SLE',
        'Win 10 Pro' => 'Win 10 Pro',
        'Win 10 Home' => 'Win 10 Home',
        'Win XP Pro' => 'Win XP Pro',
        'Win 7 Pro' => 'Win 7 Pro',
        'Win 8 Pro' => 'Win 8 Pro',
        'Win Server 2008' => 'Win Server 2008',
        'Win Server 2012' => 'Win Server 2012',
        'Win Server 2012' => 'Win Server 2019',
        'Linux Ubuntu 18' => 'Linux Ubuntu 18',
        'Linux Ubuntu 20' => 'Linux Ubuntu 20',
        'Linux Ubuntu 22' => 'Linux Ubuntu 22',
        'Linux' => 'Linux',
        'Other' => 'Other',
        'None' => 'None',
        ])?>
    
    <?= $form->field($model, 'equipMSOffice')->dropDownList([
        'Office 365' => 'Office 365',
        'Office 2016' => 'Office 2016',
        'Office 2013' => 'Office 2013',
        'Office 2010' => 'Office 2010',
        'Other' => 'Other',
        'None' => 'None',
        ])?>

    <?= $form->field($model, 'equipUser')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'equipStatus')->dropDownList([
        'In Use' => 'In Use',
        'Storage' => 'Storage',
        'Spares' => 'Used for spares',
        'Discarded' => 'Discarded or Destroyed ',
        'Broken' => 'Broken',
        'Stolen' => 'Stolen',])?>
    
    <?= $form->field($model, 'equipNotes')->textarea() ?>
    
    <?= $form->field($model, 'equipAssetTag')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
