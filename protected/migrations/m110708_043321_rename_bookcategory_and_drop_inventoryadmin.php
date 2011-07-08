<?php

class m110708_043321_rename_bookcategory_and_drop_inventoryadmin extends CDbMigration
{
	public function up()
	{
		$this->renameTable('book_category', 'species_category');
		$this->dropTable('inventory_administrator');
	}

	public function down()
	{
		$this->renameTable('species_category', 'book_category');
		$this->createTable('inventory_administrator', array(
			'id'=>'pk',
			'inventoryId'=>'integer NOT NULL',
			'administratorId'=>'integer NOT NULL',
			'assignerId'=>'integer NOT NULL',
			'expiration'=>'datetime',
			'installment'=>'datetime',
			'created'=>'datetime',
			'updated'=>'datetime',
		));
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
