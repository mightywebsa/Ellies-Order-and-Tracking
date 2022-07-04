<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reps */

$this->title = 'Update ' . $model->fl_rep_name;
$this->params['breadcrumbs'][] = ['label' => 'Reps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fl_rep_name, 'url' => ['view', 'id' => $model->fl_rep_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reps-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
