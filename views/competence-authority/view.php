<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CompetenceAuthority */
?>
<div class="competence-authority-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'competence_id',
            'authority_id',
        ],
    ]) ?>

</div>
