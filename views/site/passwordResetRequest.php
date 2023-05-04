<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>Please fill out your email. A link to reset password will be sent there.</p>

<?php $form = ActiveForm::begin(['id' => 'password-reset-request-form']); ?>

    <?= $form->field($model, 'user_email')->textInput(['autofocus' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
