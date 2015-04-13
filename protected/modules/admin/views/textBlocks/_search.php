<?php
/* @var $this TextBlocksController */
/* @var $model TextBlocks */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'text_ru'); ?>
		<?php echo $form->textArea($model,'text_ru',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'text_en'); ?>
		<?php echo $form->textArea($model,'text_en',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'android_enabled'); ?>
		<?php echo $form->textField($model,'android_enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ios_enabled'); ?>
		<?php echo $form->textField($model,'ios_enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desktop_enabled'); ?>
		<?php echo $form->textField($model,'desktop_enabled'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->