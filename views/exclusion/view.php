<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Exclusion */
?>
<div class="exclusion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'authority_id',
            'level_max',
        ],
    ]) ?>

</div>
