<?php
/* @var $this ReservationDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reservation Details',
);

$this->menu=array(
	array('label'=>'Create ReservationDetails', 'url'=>array('create')),
	array('label'=>'Manage ReservationDetails', 'url'=>array('admin')),
);
?>

<h1>Reservation Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
