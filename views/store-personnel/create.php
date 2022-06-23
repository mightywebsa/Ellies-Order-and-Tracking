<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StorePersonnel */

$this->title = 'Create Store Personnel';
$this->params['breadcrumbs'][] = ['label' => 'Store Personnels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-personnel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
