<div class="form">
	<form id="view-saved-form" method="post" action="submit" >
	<?php 	if($dataProvider->totalItemCount != 0):  ?>
	<input type="submit" value="捐了" name="view-saved-form" />
	<?php endif; ?>
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$dataProvider,
		'columns'=>array(
				'id',
				'book.species.name',
				'book.species.author',
				'book.species.seed',
				array(
					'class'=>'CButtonColumn',
					),
			),
	)); ?>
	</form>
</div>
