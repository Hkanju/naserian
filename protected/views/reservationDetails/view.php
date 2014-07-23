<?php
/* @var $this ReservationDetailsController */
/* @var $model ReservationDetails */

$this->breadcrumbs=array(
	'Reservation Details'=>array('index'),
	$model->name,
);
/**
$this->menu=array(
	array('label'=>'List ReservationDetails', 'url'=>array('index')),
	array('label'=>'Create ReservationDetails', 'url'=>array('create')),
	array('label'=>'Update ReservationDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReservationDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReservationDetails', 'url'=>array('admin')),
);  **/
?>

<h1 style="color:green; ">Thank you for chosing Villa Naserian!<?php //echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'check_in',
		'check_out',
		'room_tyepe',
		'adults',
		'children',
		'name',
		'email',
		'phone',
		'other_info',
	),
)); ?>

<?php // echo CHtml::link('Link Text',array('url'=>array('update', 'id'=>$model->id))); ?>
 
