<?php
$this->menu=array(
	array('label'=>'Добавить видео', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#video-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление видео</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'video-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
            'name' => 'id',
            'headerHtmlOptions' => array('width' => 40),
        ),
		'path',
		'name',
		'description',
		'enable' => array(
            'name' => 'enable',
            'value' => '($data->enable==1)? "+" : "-"',
            'headerHtmlOptions' => array('width' => 40),
            'htmlOptions' => array('style' => 'text-align: center'),
        ),
		array(
			'class'=>'CButtonColumn',
            'viewButtonOptions' => array('style' => 'display:none'),
		),
	),
)); ?>
