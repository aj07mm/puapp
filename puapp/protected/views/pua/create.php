<?php
/* @var $this PuaController */
/* @var $model Pua */

$this->breadcrumbs=array(
	'Puas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pua', 'url'=>array('index')),
	array('label'=>'Manage Pua', 'url'=>array('admin')),
);
?>

<h1>Create Pua</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>