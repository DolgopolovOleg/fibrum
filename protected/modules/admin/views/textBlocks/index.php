<?php
/* @var $this TextBlocksController */
/* @var $model TextBlocks */

$this->breadcrumbs=array(
	'Text Blocks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create text block', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#text-blocks-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage text blocks</h1>

<!--<p>-->
<!--You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>-->
<!--or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.-->
<!--</p>-->
<!---->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'text-blocks-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'text_ru',
		'text_en',
		'android_enabled' => array(
            'name' => 'android_enabled',
            'value' => '($data->android_enabled==1)? "+" : "-"',
            'headerHtmlOptions' => array('width' => 50),
            'htmlOptions' => array('style' => 'text-align: center'),
        ),
		'ios_enabled' => array(
            'name' => 'ios_enabled',
            'value' => '($data->ios_enabled==1)? "+" : "-"',
            'headerHtmlOptions' => array('width' => 40),
            'htmlOptions' => array('style' => 'text-align: center'),
        ),
		'desktop_enabled' => array(
            'name' => 'desktop_enabled',
            'value' => '($data->desktop_enabled==1)? "+" : "-"',
            'headerHtmlOptions' => array('width' => 40),
            'htmlOptions' => array('style' => 'text-align: center'),
        ),
		array(
			'class'=>'CButtonColumn',
            'viewButtonOptions' => array('style' => 'display:none'),
		),
	),
)); ?>
