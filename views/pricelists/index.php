<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PricelistsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Pricing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pricelists-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('New Price', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'item_code',
            'item_desc',
            'item_base_price',
            'pricelist_id',         

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
