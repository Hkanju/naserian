<?php
/* @var $this ReservationDetailsController */
/* @var $model ReservationDetails */

 $image=CHtml::image(Yii::app()->request->baseUrl . "/images/book.jpg","Alt Text for Image");  

$this->breadcrumbs=array(
	'Reservation Details'=>array('index'),
	'Create',
);

/*
$this->menu=array(
	array('label'=>'List ReservationDetails', 'url'=>array('index')),
	array('label'=>'Manage ReservationDetails', 'url'=>array('admin')),
); */

?>

<h1>Add Reservation Details</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>