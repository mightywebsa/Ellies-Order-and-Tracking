<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Picking */

$this->title = 'New Picking Slip';
$this->params['breadcrumbs'][] = ['label' => 'Picking Slips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
