<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reps-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Reps', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,        
        'columns' => [
            'fl_rep_code',
            'fl_rep_name',
            'fl_rep_fullname',
            'fl_rep_email', 
            [                
                'label' => 'Active',
                'attribute' => 'fl_rep_active',
                'value' => function($model){
                return $model->fl_rep_active == 1 ? 'Yes':'No';
                },                
                'format' => 'raw',
            ],
                        
            ['class' => 'yii\grid\ActionColumn'],
        ],        
    ]); ?>


</div>
