<form id='species-form'>
	<p>
		<?php 
			if ($species->id){
				echo '书籍存在，不用重新创建。如要添加数量，请填写相关数据';
			}else {
				echo '书籍不存在，请创建';
			}
		?>
	</p>
	<label>书名</label>
	<input type='text' name='name' value='<?php echo $speciesName ?>' <?php if ($species->id) echo 'onfocus="this.blur()"' ?> />
	<label>作者</label>
	<input type='text' name='author' value='<?php echo $species->author ?>' <?php if ($species->id) echo 'onfocus="this.blur()"' ?> />

	<a href='#show-book-detail' id='show-book-detail'><p>填写详细信息</p></a>
	<div id='book-detail' style='display: none'>
		<div class='split-line'></div>
		<label>新旧程度</label>
		<select name='book-damage'></select>
		<label>ISBN</label>
		<input type='text' name='boook-isbn' />
		<label>描述</label>
		<textarea name='book-description'></textarea>
	</div>

	<input type='submit' name='submit' value='提交' />
	
</form>
