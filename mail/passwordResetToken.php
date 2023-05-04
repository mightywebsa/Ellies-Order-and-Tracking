<?php
/* @var $this yii\web\View */
/* @var $user app\models\User */
?>
Hello <?= $user->username ?>,

Follow the link below to reset your password:

<?= Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]) ?>
