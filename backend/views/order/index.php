<?php

use yii\bootstrap5\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'id' => 'ordersTable',
        'dataProvider' => $dataProvider,
        'options' => [ 'style' => 'width:90%; margin-left:5%;' ],
        //'filterModel' => $searchModel,
        'pager' => [
            'class' => \yii\bootstrap5\LinkPager::class
        ],

        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width: 50px; text-align: center']
            ],

            [
                'attribute' => 'fullname',
                'content' => function ($model) {
                    return $model->firstname . ' ' . $model->lastname;
                },
                'contentOptions' => ['style' => 'white-space: nowrap; width: 300px; text-align: right;']
            ],

            'email:email',
            //'total_price:currency',
            [
                'attribute' => 'total_price',
                'format' => ['currency'],
                'contentOptions' => ['style' => 'white-space: nowrap; width: 150px; text-align: center;']

            ],

            //'transaction_id',
            //'paypal_order_id',

            [
                'attribute' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status', \common\models\Order::getStatusLabels(), [
                    'class' => 'form-control',
                    'prompt' => 'All'
                ]),
                'format' => ['orderStatus'],
                'contentOptions' => ['style' => 'white-space: nowrap; width: 150px; text-align: center;']
            ],

            //'created_at:datetime',
            [
                'attribute' => 'created_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'white-space: nowrap; width: 200px; text-align: center;']
            ],

            //'created_by',

            [
                'class' => 'common\grid\ActionColumn',
                'template' => '{view} {update}',
                'contentOptions' => [
                    'class' => 'td-actions',
                    'style' => 'text-align: center;'
                ]
            ],
        ],
    ]); ?>


</div>