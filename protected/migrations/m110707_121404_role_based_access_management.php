<?php

class m110707_121404_role_based_access_management extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
		// echo "m110707_121404_role_based_access_management does not support migration down.\n";
		// return false;
	// }

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->dropTable('role');
		$this->dropTable('administrator');
		$this->dropTable('administrator_role');
	}

	public function safeDown()
	{
		$this->createTable('role', array(
			'id' => 'pk',
			'doAdministrator' => 'boolean',
			'doInventory' => 'boolean',
			'doUser' => 'boolean',
			'doOrder' => 'boolean',
			'doDelivery' => 'boolean',
			'created' => 'datetime',
			'updated' => 'datetime',
			)
		);
		$this->createTable('administrator', array(
			'id' => 'pk',
			'username' => 'string',
			'password'=>'string',
			'creatorId'=>'integer',
			'email'=>'string',
			'cell'=>'string',
			'created'=>'datetime',
			'updated'=>'datetime',
			)
		);
		$this->createTable('administrator_role', array(
			'id'=>'pk',
			'administratorId'=>'integer',
			'roleId'=>'integer',
			'created'=>'datetime',
			'updated'=>'datetime',
			)
		);
	}
	
}