<?php

    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\ListView;        
    use app\models\Equipment;
    use app\models\Picking;
    use app\models\RepTripsheets;
    use app\models\Customers;
    
    

/* @var $this yii\web\View */
$equipment = new \yii\data\ActiveDataProvider([
    'query' => Equipment::find(),    
    'sort' => [
        'defaultOrder' => [
            'equipAdded' => SORT_DESC]
        ]    
]) ;
        
$picking = new \yii\data\ActiveDataProvider([
    'query' => Picking::find()->orderBy(['fl_ps_inv_date' => SORT_DESC])->limit(5),   
    'pagination' => false,
    'sort' => [
        'defaultOrder' => [
            'fl_ps_inv_date' => SORT_DESC,]
        ]    
]); 
        
$rep_trip = new \yii\data\ActiveDataProvider([
    'query' => RepTripsheets::find()->where(['user_id' => Yii::$app->user->id])->limit(5),
    'pagination' => false,    
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
        
    </div>
      
      <div class="col-md-4" style="height: 70vh">
        <h3>Latest PS</h3>
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
                [ 
                    'attribute' => 'fl_ps_customer', 
                    'format' => 'raw', 
                    'value' => function ($model) { 
                        $customerName = Customers::findone($model->fl_ps_customer)->fl_customer_name;
                        return Html::a($customerName, [ 'customers/view', 'id' => $model->fl_ps_customer ], ['target' => '_self']);                     
                    }, 
                ], 
                ]
            ])        
        ?>
        <?= Html::a('All Picking Slips', [ 'picking/index'],  ['class' => 'btn btn-success'], ['target' => '_self']); ?>
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
                    $customerName = Customers::findone($model->customer_name)->fl_customer_name;
                    return Html::a($customerName, [ 'rep-tripsheets/view', 'id' => $model->id ], ['target' => '_self']);                     
                }, 
            ],          
            'visit_date',
            'visit_time'
        ]
        ])        
    ?>
    <?= Html::a('All Trips', [ 'rep-tripsheets/index'],  ['class' => 'btn btn-success'], ['target' => '_self']); ?>
    </div>
  </div>
</div>