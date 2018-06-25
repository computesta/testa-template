<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Competence */
?>
<div class="competence-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'study_program_id',
            'name',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
