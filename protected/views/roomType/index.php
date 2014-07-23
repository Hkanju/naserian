<?php
/* @var $this RoomTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Types',
);

$this->menu=array(
	array('label'=>'Create RoomType', 'url'=>array('create')),
	array('label'=>'Manage RoomType', 'url'=>array('admin')),
);
?>

<h1>Room Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
