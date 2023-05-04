<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Customers;

/* @var $this yii\web\View */
/* @var $model app\models\RepTripsheets */

$this->title = 'Trip to: '.$model->customer_name;
$this->params['breadcrumbs'][] = ['label' => 'Rep Tripsheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rep-tripsheets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'date',            
            'area',
            [
                'attribute' => 'customer_name',
                'format' => 'raw',
                'value' => function($model){
                    $customer = Customers::find()->where(['fl_customer_id' => $model->customer_name])->one();
                    echo yii\helpers\Url::toRoute(['customers/view','id'=>$model->customer_name]);
                    return $customer->fl_customer_name;
                }
                            
                
            ],
            'customer_town',
            'customer_contact',
            'customer_number',
            'customer_order',
            'comments:ntext',
        ],
    ]) ?>

</div>
