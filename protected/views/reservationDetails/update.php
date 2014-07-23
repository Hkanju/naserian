<?php
/* @var $this ReservationDetailsController */
/* @var $model ReservationDetails */

$this->breadcrumbs=array(
	'Reservation Details'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReservationDetails', 'url'=>array('index')),
	array('label'=>'Create ReservationDetails', 'url'=>array('create')),
	array('label'=>'View ReservationDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReservationDetails', 'url'=>array('admin')),
);
?>

<h1>Update ReservationDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>