<?php

use app\models\CompetenceAuthority;
use app\models\Exclusion;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Exclusion */
/* @var $form ActiveForm */
?>

<div class="exclusion-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'user_id')->widget(Select2::className(),[
		'data' => Exclusion::getDataListUser(),
		'size' => Select2::MEDIUM,
		'theme' => Select2::THEME_BOOTSTRAP,
		'options' => ['placeholder' => 'Select User ...'],
		'pluginOptions' => [
			'allowClear' => true,
		],
	]) ?>

	<?= $form->field($model, 'authority_id')->widget(Select2::className(),[
		'data' => Exclusion::getDataListAuthority(),
		'size' => Select2::MEDIUM,
		'theme' => Select2::THEME_BOOTSTRAP,
		'options' => ['placeholder' => 'Select Authority ...'],
		'pluginOptions' => [
			'allowClear' => true,
		],
	]) ?>

    <?= $form->field($model, 'level_max')->input('number') ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
