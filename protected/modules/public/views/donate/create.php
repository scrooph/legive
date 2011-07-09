<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'create-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'focus'=>array($model, 'author'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="row">
	<?php echo $form->label($model, 'name'); ?>
	<?php echo $model->name; ?>
	<?php echo $form->error($model, 'name'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model, 'author'); ?>
	<?php echo $form->textField($model, 'author'); ?>
	<?php echo $form->error($model, 'author'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model, 'page'); ?>
	<?php echo $form->textField($model, 'page'); ?>
	<?php echo $form->error($model, 'page'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model, 'price'); ?>
	<?php echo $form->textField($model, 'price'); ?>
	<?php echo $form->error($model, 'price'); ?>
</div>
<div class="row">
	<input type="submit" name="create-form" value="submit" />
</div>

<?php $this->endWidget(); ?>
