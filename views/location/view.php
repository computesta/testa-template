<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
?>
<div class="location-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'study_program_id',
            'location',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
