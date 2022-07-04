<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = $model->equipBrand ." - ". $model->equipModel;
$this->params['breadcrumbs'][] = ['label' => 'Hardware', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->equipId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->equipId], [
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
            'equipType',
            'equipBrand',
            'equipModel',
            'equipSerial',
            'equipCPU',
            'equipRAM',
            'equipHDD',
            'equipScreen',
            'equipPCName',
            'equipOS',
            'equipMSOffice',            
            'equipUser',
            'equipStatus',
            'equipNotes',
            'equipAdded',
            'equipDate',
            'equipAssetTag',
        ],
    ]) ?>

</div>
