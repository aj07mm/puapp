<?php
/* @var $this HistoryController */
/* @var $model History */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'history-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'num_de_sets'); ?>
		<?php echo $form->textField($model,'num_de_sets',array(
		'id'=>'score',
		'style'=>'text-align:center;font-size:80px;width:107px;')); ?>
		<?php echo $form->error($model,'num_de_sets'); ?>
	</div>

	<img id="plus" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAABUElEQVR4Aa3PMUscQQDH0aeo0UOQI13ATuSijbXZRlDQ2F/nh7CwlEvrIVy0FiyEeH4HsbCxMWAl6GqjiJ0IFpGDuUmTFLvD5pq87WZ+f9jxfwyZ0bSsbqCaljOv4p/v3ol1lb7IBRf2bZiT2XTsQXRoSmLMriCXKRr1Tc+jFSW7+r6rIbXgyrv54s8EHdXqnlwaAajJ5WqqsSbaBmgJMoMc6JkGzlwoasi1k7OoCUNe7Zeunv0SS68a9mYHZkQbpfzZZ51kcu4UmqK5Ut6AZLLnBZZFmTRPJ0fuoC7aBPz4mxcms4BrXeDeMeCTj8pmjYFJwRZw4sGoQVZFS8C6qOXfJty4NQ5wqGcB1TqCRQCmPLpSV+WrvraCFe+erElN6Oj76YOSeZeiAw3DACatuhG00xxGbOuJ3pzbc+RaEN1apNq0ph2nXtzp2rJkHAB+A8Y3da86hTJzAAAAAElFTkSuQmCC"/>
	<img id="minus" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAABTUlEQVR4Aa3Or0tdYRzH8Rei21VEkbWB5aaLFuOQW8QbdF3L8F8YGAQRZKvecqZRhIUL0z/BYLJYHJj8XRTEIhaLXHjOd/nhcLhlr/z+wMf/0rRi0aSBGjYdexFCKF3r6aj1xZXkzJ41M9rWHXoU9k2o+KArudOWG/FT34MOua7SL2OomnPh3Wx+JinUm/Lk3DBAw5U7Y6i3LGwDbEraBjnQNw0cOzNYS1gFXuwBvtuqZH98BkPe7EBTWANsCUWWP3v2CXDqBFaEGQCFUGR5C8CuV1gU2sgn1Zyee5hUWkc++V3JuXQEXDuEfFLJxyUbQM+jEblvmnJLwgLQEX6AeqNu3GoA7OubQ71CMg/AhAcXptT5qtSV6Xj3ZFnVqELpr4/kZp0LB1qGAIxbciPpVnMYtq0vvDm1q+dSEm7NU2/aqh0nXt07smFBAwD+AatedTAj6lnSAAAAAElFTkSuQmCC"/>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
document.getElementById('plus').addEventListener('click',function(){
	input = document.getElementById('score');
	input.value++;
});
document.getElementById('minus').addEventListener('click',function(){
	input = document.getElementById('score');
	input.value--;
});
</script>