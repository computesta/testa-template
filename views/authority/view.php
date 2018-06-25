<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Authority */
?>
<div class="authority-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'study_program_id',
            'name',
            'semester_start',
            'semester_end',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
