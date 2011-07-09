<?php

class m110706_064126_create_inventory_college extends CDbMigration
{
/*
	public function up()
	{
		
	}

	public function down()
	{
		echo "m110706_064126_create_inventory_college does not support migration down.\n";
		return false;
	}
	*/

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('inventory_college', array(
			'id' => 'pk',
			'inventoryId' => 'integer NOT NULL',
			'collegeId' => 'integer NOT NULL',
			'created' => 'datetime',
			'updated' => 'datetime',
			));
		$this->createIndex('College', 'inventory_college', 'collegeId');
		$this->createIndex('Inventory', 'inventory_college', 'inventoryId');
	}

	public function safeDown()
	{
		$this->dropTable('inventory_college');
	}
	
}