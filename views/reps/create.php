<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reps */

$this->title = 'Create Reps';
$this->params['breadcrumbs'][] = ['label' => 'Reps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
