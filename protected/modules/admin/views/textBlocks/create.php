<?php
/* @var $this TextBlocksController */
/* @var $model TextBlocks */


$this->menu=array(
	array('label'=>'List TextBlocks', 'url'=>array('index')),
);
?>

<h1>Create TextBlocks</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>