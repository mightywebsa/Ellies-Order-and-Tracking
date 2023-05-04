<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CitiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Areas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('New Area', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'city',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->city,['cities/update','id' => $model->id],['target' => '_self']);
                }
            ],
            'city',            
            'area',
            'country',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
