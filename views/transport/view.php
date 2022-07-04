<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transport */

$this->title = $model->fl_trans_name;
$this->params['breadcrumbs'][] = ['label' => 'Transport', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transport-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fl_trans_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fl_trans_id], [
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
            'fl_trans_id',
            'fl_trans_name',
            'fl_trans_addr1:ntext',
            'fl_trans_addr2:ntext',
            'fl_trans_phone',
            'fl_trans_fax',
            'fl_trans_cell',
            'fl_trans_code',
            [                
                'label' => 'Active',
                'attribute' => 'fl_trans_active',
                'value' => function($model){
                return $model->fl_trans_active == 1 ? 'Yes':'No';
                },                
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
