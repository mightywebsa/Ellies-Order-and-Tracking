<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = 'Update ' . $model->fl_customer_name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fl_customer_name, 'url' => ['view', 'id' => $model->fl_customer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
