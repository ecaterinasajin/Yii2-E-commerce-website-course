<style>
   .desctr p {
    max-height: 150px;
    overflow: auto;
    padding-right:15px;
   }

</style>

<?php

use common\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'options' => [ 'style' => 'width:100%;' ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width: 50px; text-align: center']
            ],

            //'name',
            [
                'attribute' => 'name',
                'contentOptions' => ['style' => 'width: 250px'],
                'content' => function ($model) {
                    return \yii\helpers\StringHelper::truncateWords($model->name, 7);
                }
            ],
            //'image',
            [ //eror
                'label' => 'Image',
                    'attribute' => 'image',
                    'contentOptions' => ['style' => 'width: 150px;'],
                    'content' => function ($model) {
                        /** @var \common\models\Product $model */
                        return Html::img($model->getImageUrl(), ['style' => 'width: 110px; display: block; margin-left: auto; margin-right: auto;']);
                    }
            ],

            //'price',
            //'price:currency',
            [
                'attribute' => 'price',
                'format' => ['currency'],
                'contentOptions' => ['style' => 'white-space: nowrap; width: 50px; text-align: center;']

            ],

            //'status',
            [
                'attribute' => 'status',
                'contentOptions' => ['style' => 'width: 50px; text-align: center;'],
                'content' => function ($model) {
                    /** @var \common\models\Product $model */
                    return Html::tag('span', $model->status ? 'Active' : 'Draft', [
                        'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                    ]);
                }
            ],

            //'created_at',
            //'updated_at',
            [
                'attribute' => 'created_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'width: 50px; text-align: center;']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'width: 50px; text-align: center;']
            ],

            //'created_by',
            //'updated_by',
            //'description:html',
            [
                'attribute' => 'description',
                'format' => ['html'],
                'contentOptions' => [
                    'style' => 'text-align: justify; overflow: true; text-overflow: ellipsis;',
                    'class' => 'desctr'
                ],
            ],

            /*['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 70px'],
            ],*/
            [
                'contentOptions' => ['style' => 'width: 0px'],
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
