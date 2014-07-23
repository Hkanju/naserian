<?php
/* @var $this ReservationDetailsController */
/* @var $model ReservationDetails */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_in'); ?>
		<?php echo $form->textField($model,'check_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_out'); ?>
		<?php echo $form->textField($model,'check_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_tyepe'); ?>
		<?php echo $form->textField($model,'room_tyepe',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adults'); ?>
		<?php echo $form->textField($model,'adults'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'children'); ?>
		<?php echo $form->textField($model,'children'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_info'); ?>
		<?php echo $form->textField($model,'other_info',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->