<?php

    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\ListView;        
    use app\models\Equipment;
    use app\models\Picking;
    use app\models\RepTripsheets;
    
    

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
]) ;
        
$picking = new \yii\data\ActiveDataProvider([
    'query' => Picking::find(),
    'pagination' => [
        'pageSize' => 5,
    ],    
    'sort' => [
        'defaultOrder' => [
            'fl_ps_inv_date' => SORT_DESC]
        ]    
]); 
        
$rep_trip = new \yii\data\ActiveDataProvider([
    'query' => RepTripsheets::find()->where(['user_id' => Yii::$app->user->id]),
    'pagination' => [
        'pageSize' => 5,
    ],    
    'sort' => [
        'defaultOrder' => [
            'visit_date' => SORT_DESC]
        ]    
]) 
        
?>
<h1>Ellies Tracking Dashboard</h1>

<div class="container">
  <div class="row">
    <div class="col-md-4">
        <h3>Latest Orders</h3>
        <?=GridView::widget([
            'dataProvider' => $picking, 
            'columns' => [
                [ 
                    'attribute' => 'fl_ps_no', 
                    'format' => 'raw', 
                    'value' => function ($model) { 
                        return Html::a($model->fl_ps_no, [ 'picking/view', 'id' => $model->fl_ps_id ], ['target' => '_self']);                     
                    }, 
                ],

                'fl_ps_customer'
                ]
            ])        
        ?>
    </div>
      
    <div class="col-md-4">
        <h3>Picking Slips</h3>
    </div>
      
    <div class="col-md-4">
        <h3>My Trips</h3>
        <?=GridView::widget([
        'dataProvider' => $rep_trip, 
        'columns' => [
            [ 
                'attribute' => 'customer_name', 
                'format' => 'raw', 
                'value' => function ($model) { 
                    return Html::a($model->customer_name, [ 'rep-tripsheets/view', 'id' => $model->id ], ['target' => '_self']);                     
                }, 
            ],          
            'visit_date',
            'visit_time'
        ]
        ])        
    ?>
    </div>
  </div>
</div>