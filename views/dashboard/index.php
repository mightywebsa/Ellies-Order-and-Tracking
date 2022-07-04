<?php

    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\ListView;        
    use app\models\Equipment;
    
    

/* @var $this yii\web\View */
$equipment = new \yii\data\ActiveDataProvider([
    'query' => Equipment::find(),
    'pagination' => [
        'pageSize' => 5,
    ],
    'sort' => [
        'defaultOrder' => [
            'equipAdded' => SORT_DESC]
        ]    
])      
        
?>
<h1>Ellies Tracking Dashboard</h1>

<div class="container">
  <div class="row">
    <div class="col-md-4">
        <h3>Latest Orders</h3>       
    </div>
    <div class="col-md-4">
        <h3>Picking Slips</h3>
    </div>
    <div class="col-md-4">
        <h3>Equipment</h3>
        <?=        GridView::widget([
        'dataProvider' => $equipment, 
        'columns' => [
            [ 
                'attribute' => 'equipModel', 
                'format' => 'raw', 
                'value' => function ($model) { 
                    return Html::a($model->equipModel, [ 'equipment/view', 'id' => $model->equipId ], ['target' => '_self']);                     
                }, 
            ],
                        
            'equipUser'
        ]
        ])        
    ?>
    </div>
  </div>
</div>