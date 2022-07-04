<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = 'Create New Hardware';
$this->params['breadcrumbs'][] = ['label' => 'Hardware', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
