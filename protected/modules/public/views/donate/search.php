<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>

<div class="row">
	<?php echo $form->labelEx($model, 'name'); ?>
	<?php echo $form->textField($model, 'name'); ?>
	<?php echo $form->error($model, 'name'); ?>
</div>
<div>
	<input type="submit" name="search-form" value="submit" />
</div>

<?php $this->endWidget(); ?>

<?php
	$cs = Yii::app()->clientScript;
	$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/javascript/public/donate.js', CClientScript::POS_HEAD);
?>