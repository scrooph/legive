<?php

class m110708_042148_drop_book_number extends CDbMigration
{
	public function up()
	{
		$this->addColumn('book', 'number', 'string');
		$this->dropTable('species_number');
	}

	public function down()
	{
		$this->createTable('species_number', array(
			'id'=>'pk',
			'speciesId'=>'integer NOT NULL',
			'number'=>'string',
			'created'=>'datetime',
			'updated'=>'datetime',
			'KEY Species (speciesId)',
		));
		$this->dropColumn('book', 'number');
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