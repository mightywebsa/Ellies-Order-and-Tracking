<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StorePersonnelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Store Personnel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-personnel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create New Personnel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'fl_sto_id',
            'fl_sto_name',
            'fl_sto_position',            
            'fl_sto_active',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
