<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StudyProgram */
?>
<div class="study-program-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
