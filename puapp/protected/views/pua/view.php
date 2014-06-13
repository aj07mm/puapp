<?php
/* @var $this PuaController */
/* @var $model Pua */

$this->breadcrumbs=array(
	'Puas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pua', 'url'=>array('index')),
	array('label'=>'Create Pua', 'url'=>array('create')),
	array('label'=>'Update Pua', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pua', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pua', 'url'=>array('admin')),
);
?>

<h1>View Pua #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'alias',
		'pontuation',
		'photo',
	),
)); ?>
