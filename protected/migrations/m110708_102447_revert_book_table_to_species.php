<?php

class m110708_102447_revert_book_table_to_species extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('book', 'numberId', 'speciesId');
	}

	public function down()
	{
		$this->renameColumn('book', 'numberId', 'speciesId');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
