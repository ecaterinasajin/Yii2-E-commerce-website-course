<?php
/** @var \common\models\Product $model */
?>
   <div class="card">
        <a href="#" class="img-wrapper">
            <img class="card-img-top" height="550px" src="<?php echo $model->getImageUrl() ?>" alt="">
        </a>
        <div class="card-body">
            <h5 class="card-title">
                <a href="#" class="text-dark"><?php echo \yii\helpers\StringHelper::truncateWords($model->name, 20) ?></a>
            </h5>
            <h5><?php echo Yii::$app->formatter->asCurrency($model->price) ?></h5>
            <div class="card-text">
                <?php echo $model->getShortDescription() ?>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>" class="btn btn-add-to-cart" style="background-color: #4e73df; color:white; margin-left:70%;" >
                Add to Cart
            </a>
        </div>
    </div>