<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */
?>
<div class="feedback-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'activity_id',
            'performance',
            'recommendations',
            'aspect',
            'feedback',
            'status',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
