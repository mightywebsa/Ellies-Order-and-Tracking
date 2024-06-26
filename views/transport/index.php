<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transport-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transport', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'fl_trans_id',
            'fl_trans_name',
            'fl_trans_addr1:ntext',
            //'fl_trans_addr2:ntext',
            'fl_trans_phone',
            //'fl_trans_fax',
            'fl_trans_cell',
            //'fl_trans_code',
            //'fl_trans_active',
            [                
                'label' => 'Active',
                'attribute' => 'fl_trans_active',
                'value' => function($model){
                return $model->fl_trans_active == 1 ? 'Yes':'No';
                },                
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
