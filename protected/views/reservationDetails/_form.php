<?php
/* @var $this ReservationDetailsController */
/* @var $model ReservationDetails */
/* @var $form CActiveForm */
?>
<style type="text/css">
.tftable {font-size:12px;color:#333333;width:100%;border-width: 0px;border-color: #a9a9a9;border-collapse: collapse;}
.tftable th {font-size:12px;background-color:#white;border-width: 0px;padding: 8px;border-style: solid;border-color: #a9a9a9;text-align:left;}
.tftable tr {background-color:#F3F6F8;}
.tftable td {font-size:20px; border-width: 0px;padding: 8px;border-style: solid;border-color: #a9a9a9;}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reservation-details-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>  -->

	<?php echo $form->errorSummary($model); ?>

<table class='tftable' >
	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>
--><tr>
<td style=" text-align: right;"><?php echo $form->labelEx($model,'check_in'); ?></td>
<td>
		 <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                   'model'=>$model,
                   'attribute'=>'check_in',
                   'options'=>array(
                   'showAnim'=>'fold',
                   'dateFormat'=>Yii::app()->params->datePickerFormat,
                   ),
                    'htmlOptions'=>array('style'=>'width:175px','class'=>'NFTextCenter'),
                   ));
           ?>
		<?php echo $form->error($model,'check_in'); ?>
</td>
</tr>
	 
	 <tr>
		<td style=" text-align: right;"><?php echo $form->labelEx($model,'check_out'); ?></td>
		<td> <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                   'model'=>$model,
                   'attribute'=>'check_out',
                   'options'=>array(
                   'showAnim'=>'fold',
                   'dateFormat'=>Yii::app()->params->datePickerFormat,
                   ),
                    'htmlOptions'=>array('style'=>'width:175px','class'=>'NFTextCenter'),
                   ));
           ?>
		<?php echo $form->error($model,'check_out'); ?>
	</td>
	 </tr>


	 	<tr>
	 		<td style=" text-align: right;"><?php echo $form->labelEx($model,'room_tyepe'); ?></td>
	 		<td><?php $dropDown_array =array();
                $dropDown_array['Single'] = 'Single';
                $dropDown_array['Double'] = 'Double';
               echo CHtml::activeDropDownList($model,'room_tyepe',$dropDown_array,array('style'=>'width:180px')); ?>
		</td>

	 	</tr>	

	 	<tr>
	 		<td style=" text-align: right;"><?php echo $form->labelEx($model,'adults'); ?></td>
	 		<td><?php $dropDown_array =array();
                $dropDown_array['1'] = '1';
                $dropDown_array['2'] = '2';
                $dropDown_array['3'] = '3';
                $dropDown_array['4'] = '4';
                $dropDown_array['5'] = '5';
                $dropDown_array['6'] = '6';
               echo CHtml::activeDropDownList($model,'adults',$dropDown_array,array('style'=>'width:180px')); ?>
			<?php echo $form->error($model,'adults'); ?>
			</td>

	 	</tr>
	
		<tr>
			<td style=" text-align: right;"><?php echo $form->labelEx($model,'children'); ?></td>
			<td><?php $dropDown_array =array();
				$dropDown_array['-'] = '-';
                $dropDown_array['1'] = '1';
                $dropDown_array['2'] = '2';
                $dropDown_array['3'] = '3';
                $dropDown_array['4'] = '4';
                $dropDown_array['5'] = '5';
                $dropDown_array['6'] = '6';
               echo CHtml::activeDropDownList($model,'children',$dropDown_array,array('style'=>'width:180px'));  ?>
			<?php echo $form->error($model,'children'); ?>
		</td>

		</tr>

		<tr>
			<td style=" text-align: right;"><?php echo $form->labelEx($model,'name'); ?></td>
			<td><?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'name'); ?>
			</td>

		</tr>

		<tr>
			<td style=" text-align: right;"><?php echo $form->labelEx($model,'email'); ?></td>
			<td><?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>100)); ?>
				<?php echo $form->error($model,'email'); ?>
			</td>
		</tr>

		<tr>
			<td style=" text-align: right;"><?php echo $form->labelEx($model,'phone'); ?></td>
			<td><?php echo $form->textField($model,'phone',array('size'=>22,'maxlength'=>45)); ?>
				<?php echo $form->error($model,'phone'); ?>
			</td>
		</tr>

		<tr>
			<td style=" text-align: right;"><?php echo $form->labelEx($model,'other_info'); ?></td>
			<td><?php echo $form->textArea($model,'other_info',array('size'=>45,'maxlength'=>45)); ?>
				<?php echo $form->error($model,'other_info'); ?>
			</td>
		</tr>

		<tr>
			<td></td><td><?php echo CHtml::submitButton($model->isNewRecord ? 'Subimit' : 'Save', array('confirm'=>"Are you sure you want to save?",'class'=>'button')); ?></td>
		</tr>
	

</table>

<?php $this->endWidget(); ?>

</div><!-- form -->