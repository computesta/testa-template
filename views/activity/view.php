<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
?>
<div class="activity-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'location_id',
            'supervisor_id',
            'authority_id',
            'authority_phase',
            'date',
            'case',
            'description',
            'difficulty',
            'learn',
            'plan',
            'picture',
            'status',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
