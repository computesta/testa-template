<?php

use app\models\CompetenceAuthority;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model CompetenceAuthority */
/* @var $form ActiveForm */
?>

<div class="competence-authority-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'competence_id')->widget(Select2::className(),[
		'data' => CompetenceAuthority::getDataListCompetence(),
		'size' => Select2::MEDIUM,
		'theme' => Select2::THEME_BOOTSTRAP,
		'options' => ['placeholder' => 'Select Competence ...'],
		'pluginOptions' => [
			'allowClear' => true,
		],
	]) ?>

	<?= $form->field($model, 'authority_id')->widget(Select2::className(),[
		'data' => CompetenceAuthority::getDataListAuthority(),
		'size' => Select2::MEDIUM,
		'theme' => Select2::THEME_BOOTSTRAP,
		'options' => ['placeholder' => 'Select Authority ...'],
		'pluginOptions' => [
			'allowClear' => true,
		],
	]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
