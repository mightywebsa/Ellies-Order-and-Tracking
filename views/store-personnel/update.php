<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StorePersonnel */

$this->title = 'Update Store Personnel: ' . $model->fl_sto_name;
$this->params['breadcrumbs'][] = ['label' => 'Store Personnel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fl_sto_name, 'url' => ['view', 'id' => $model->fl_sto_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="store-personnel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
