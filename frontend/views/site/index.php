<?php

/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = 'E-commers';
?>
<div class="site-index">

    <div class="body-content">

        <?php echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{summary}<div class="row">{items}</div>{pager}',
            'itemView' => '_product_item',
            'itemOptions' => [
                'class' => 'col-lg-4 col-md-7 mb-4 product-item',
                'style' => 'width:440px;'
            ],
            'pager' => [
                'class' => \yii\bootstrap5\LinkPager::class
            ]
        ]) ?>

    </div>
</div>