<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PackageAuthority */
?>
<div class="package-authority-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'package_id',
            'authority_id',
            'level_max',
        ],
    ]) ?>

</div>
