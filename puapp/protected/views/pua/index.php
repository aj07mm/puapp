<?php
/* @var $this PuaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Puas',
);

$this->menu=array(
	array('label'=>'Create Pua', 'url'=>array('create')),
	array('label'=>'Manage Pua', 'url'=>array('admin')),
);
?>

<h1>Puas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
