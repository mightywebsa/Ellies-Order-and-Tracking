<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RepTripsheets */

$this->title = 'Log new trip';
$this->params['breadcrumbs'][] = ['label' => 'Rep Tripsheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rep-tripsheets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
