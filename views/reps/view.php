<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reps */

$this->title = $model->fl_rep_name;
$this->params['breadcrumbs'][] = ['label' => 'Reps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reps-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fl_rep_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fl_rep_code], [
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
            'fl_rep_code',
            'fl_rep_name',
            'fl_rep_fullname',
            'fl_rep_email:email',
            [                
                'label' => 'Rep Active',
                'attribute' => 'fl_rep_active',
                'value' => function($model){
                return $model->fl_rep_active == 1 ? 'Yes':'No';
                },                
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
