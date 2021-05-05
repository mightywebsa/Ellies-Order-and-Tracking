<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StorePersonnel */

$this->title = $model->fl_sto_name;
$this->params['breadcrumbs'][] = ['label' => 'Store Personnel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="store-personnel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fl_sto_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fl_sto_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'fl_sto_id',
            'fl_sto_name',
            'fl_sto_position',            
            [
                'attribute' => 'Active',
                'value' => (($model->fl_sto_active ==1) ? "Active":'Not Active'),
            ],
        ],
    ]) ?>

</div>
