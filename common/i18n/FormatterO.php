<?php

namespace common\i18n;

use yii\i18n\Formatter;

/**
 * Class Formatter
 * @package common\i18n
 */
class FormatterO extends Formatter
{
    public function asOrderStatus($status)
    {
        if ($status == \common\models\Order::STATUS_COMPLETED) {
            return \yii\bootstrap5\Html::tag('span', 'Completed', ['class' => 'badge badge-success']);
        } else if ($status == \common\models\Order::STATUS_PAID) {
            return \yii\bootstrap5\Html::tag('span', 'Paid', ['class' => 'badge badge-primary']);
        } else if ($status == \common\models\Order::STATUS_DRAFT) {
            return \yii\bootstrap5\Html::tag('span', 'Unpaid', ['class' => 'badge badge-secondary']);
        } else {
            return \yii\bootstrap5\Html::tag('span', 'Failured', ['class' => 'badge badge-danger']);
        }
    }
}