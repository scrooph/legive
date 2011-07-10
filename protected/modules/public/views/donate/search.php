<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>

<div class="row">
	<?php echo $form->labelEx($model, '书名'); ?>
	<?php echo $form->textField($model, 'name'); ?>
	<?php echo $form->error($model, 'name'); ?>
	<input type="submit" name="search-form" value="检索书籍" style='display: inline' />
</div>

<?php $this->endWidget(); ?>

<div class='split-line'></div>

<div id='species-view' class='species-view' style='display: none'></div>

<?php
	$cs = Yii::app()->clientScript;
	$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/javascript/public/donate.js', CClientScript::POS_HEAD);
	$cs->registerCssFile(Yii::app()->baseUrl . '/css/legive/donate.css');
?>
