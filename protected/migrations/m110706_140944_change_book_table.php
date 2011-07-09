<?php

class m110706_140944_change_book_table extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
		// echo "m110706_140944_change_book_table does not support migration down.\n";
		// return false;
	// }

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->renameColumn('book', 'speciesId', 'numberId');
	}

	public function safeDown()
	{
		$this->renameColumn('book', 'numberId', 'speciesId');
	}
	
}