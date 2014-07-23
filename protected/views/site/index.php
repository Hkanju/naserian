<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name; ?>
<?php 
 $this->widget('ext.simple-calendar.SimpleCalendarWidget'); ?>
<table>
	<tr style="color:blue;"><th>Double</th><th>Single</th><th>Special</th></tr>
	<tr>
<td><?php echo CHtml::image(Yii::app()->request->baseUrl . "/images/room5.jpg","Alt Text for Image");?> </td>
<td> <?php echo CHtml::image(Yii::app()->request->baseUrl . "/images/roomU.jpg","Alt Text for Image"); ?> </td>
<td> <?php echo CHtml::image(Yii::app()->request->baseUrl . "/images/roomU1.jpg","Alt Text for Image"); ?> </td>
</tr>

<?php $image=CHtml::image(Yii::app()->request->baseUrl . "/images/book.jpg","Alt Text for Image");  
//echo CHtml::link($image, array('url'=>array('/reservationDetails/create'), ''));
 
 ?>
<tr>
<td style="align:center;"><?php echo CHtml::link($image,array('/reservationDetails/create')); ?> </td>
<td><?php echo CHtml::link($image,array('/reservationDetails/create')); ?> </td>
<td><?php echo CHtml::link($image,array('/reservationDetails/create')); ?> </td>
</tr>

</table>
