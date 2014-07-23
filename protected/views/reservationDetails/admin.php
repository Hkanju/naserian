<?php
/* @var $this ReservationDetailsController */
/* @var $model ReservationDetails */

$this->breadcrumbs=array(
	'Reservation Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ReservationDetails', 'url'=>array('index')),
	array('label'=>'Create ReservationDetails', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reservation-details-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Reservation Details</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reservation-details-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'check_in',
		'check_out',
		'room_tyepe',
		'adults',
		'children',
		/*
		'name',
		'email',
		'phone',
		'other_info',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
