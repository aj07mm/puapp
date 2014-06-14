<?php
/* @var $this PuaController */
/* @var $model Pua */

$this->breadcrumbs=array(
	'Puas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pua', 'url'=>array('index')),
	array('label'=>'Create Pua', 'url'=>array('create')),
	array('label'=>'View Pua', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pua', 'url'=>array('admin')),
);
?>

<h1>Update Pua <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>