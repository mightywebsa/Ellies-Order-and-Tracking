<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Otd */

$this->title = 'Update Otd: ' . $model->fl_otd_id;
$this->params['breadcrumbs'][] = ['label' => 'Otds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fl_otd_id, 'url' => ['view', 'id' => $model->fl_otd_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="otd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
