<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = $model->fl_customer_name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fl_customer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fl_customer_id], [
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
            'fl_customer_name',
            'fl_cust_accpac',
            'fl_customer_id',            
            'fl_customer_addr1:ntext',
            'fl_customer_addr2:ntext',
            'fl_customer_town:ntext',
            'fl_customer_province',
            'fl_customer_country',
            'fl_customer_comment:ntext',
            'fl_cust_email:ntext',
            'fl_date_last_used',
            'fl_cust_rep',
            'fl_cust_group',
            'fl_cust_category',            
            'fl_cust_active',
            'fl_cust_pref_delivery',
        ],
    ]) ?>

</div>
