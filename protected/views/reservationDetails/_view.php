<?php
/* @var $this ReservationDetailsController */
/* @var $data ReservationDetails */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_in')); ?>:</b>
	<?php echo CHtml::encode($data->check_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_out')); ?>:</b>
	<?php echo CHtml::encode($data->check_out); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_tyepe')); ?>:</b>
	<?php echo CHtml::encode($data->room_tyepe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adults')); ?>:</b>
	<?php echo CHtml::encode($data->adults); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('children')); ?>:</b>
	<?php echo CHtml::encode($data->children); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_info')); ?>:</b>
	<?php echo CHtml::encode($data->other_info); ?>
	<br />

	*/ ?>

</div>