<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Picking */

$this->title = 'Update PS: ' . $model->fl_ps_no;
$this->params['breadcrumbs'][] = ['label' => 'Picking Slip', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fl_ps_no, 'url' => ['view', 'id' => $model->fl_ps_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="picking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
