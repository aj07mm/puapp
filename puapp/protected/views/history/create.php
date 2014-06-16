<?php
/* @var $this HistoryController */
/* @var $model History */

$this->breadcrumbs=array(
	'Histories'=>array('index'),
	'Create',
);

?>
<div style="text-align:center">
	<h1 >SCORE</h1>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
