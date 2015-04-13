<?php
/* @var $this TextBlocksController */
/* @var $model TextBlocks */
/* @var $form CActiveForm */
?>

<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'text-blocks-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text_ru'); ?>
        <?php $this->widget('application.extensions.ckeditor.CKEditor', array( 'model'=>$model, 'attribute'=>'text_ru', 'language'=>'en', 'editorTemplate'=>'full', )); ?>
		<?php echo $form->error($model,'text_ru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text_en'); ?>
        <?php $this->widget('application.extensions.ckeditor.CKEditor', array( 'model'=>$model, 'attribute'=>'text_en', 'language'=>'en', 'editorTemplate'=>'full', )); ?>
		<?php echo $form->error($model,'text_en'); ?>
	</div>

	<div class="row">
        <?php echo $form->checkBox($model,'android_enabled'); ?>
        <?php echo $form->labelEx($model,'android_enabled', array('style'=>'display:inline')); ?>
		<?php echo $form->error($model,'android_enabled'); ?>
	</div>

	<div class="row">
        <?php echo $form->checkBox($model,'ios_enabled'); ?>
        <?php echo $form->labelEx($model,'ios_enabled', array('style'=>'display:inline')); ?>
		<?php echo $form->error($model,'ios_enabled'); ?>
	</div>

	<div class="row">
        <?php echo $form->checkBox($model,'desktop_enabled'); ?>
        <?php echo $form->labelEx($model,'desktop_enabled', array('style'=>'display:inline')); ?>
		<?php echo $form->error($model,'desktop_enabled'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->