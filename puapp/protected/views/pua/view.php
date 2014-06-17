<?php
/* @var $this PuaController */
/* @var $model Pua */

$this->breadcrumbs=array(
	'Puas'=>array('index'),
	$model->id,
);

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
