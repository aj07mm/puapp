<?php
/* @var $this HistoryController */
/* @var $model History */

$this->breadcrumbs=array(
	'Histories'=>array('index'),
	'Create',
);

?>

<h1>Create History</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>