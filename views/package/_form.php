<?php

use app\models\Package;
use app\models\StudyProgram;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Package */
/* @var $form ActiveForm */
?>

<div class="package-form">

    <?php $form = ActiveForm::begin(); ?>

	<?php /*<?= $form->field($model, 'study_program_id')->widget(Select2::className(),[
		'data' => Package::getDataListStudyProgram(),
		'size' => Select2::MEDIUM,
		'theme' => Select2::THEME_BOOTSTRAP,
		'options' => ['placeholder' => 'Select Study Program ...'],
		'pluginOptions' => [
			'allowClear' => true,
		],
	])*/ ?>
	
	<?= $form->field($model, 'study_program_id')->hiddenInput(['value' => \Yii::$app->user->identity->study_program_id])->label(false) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
