<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hardware';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('New Hardware Entry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,        
        'autoXlFormat'=>true,
        'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
        'export'=>[
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK
        ],
        'panel'=>[
            'type'=>'primary',
            'heading'=>'Equipment'
        ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],            
            'equipModel',
            'equipBrand',
            'equipType',
            'equipSerial',
            'equipStatus',                      
            'equipUser',            
            [
              'attribute' =>  'equipAdded',
              'format' =>   ['date', 'php:Y-m-d']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
