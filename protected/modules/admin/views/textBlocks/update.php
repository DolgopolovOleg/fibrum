<?php

$this->menu=array(
	array('label'=>'List text block', 'url'=>array('index')),
	array('label'=>'Create text block', 'url'=>array('create')),
);
?>

<h1>Update TextBlocks <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>