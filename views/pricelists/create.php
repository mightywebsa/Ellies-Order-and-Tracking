<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pricelists */

$this->title = 'Create Pricelists';
$this->params['breadcrumbs'][] = ['label' => 'Pricelists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pricelists-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
