<?php

class m110706_073128_create_species_number extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
		// echo "m110706_073128_create_species_number does not support migration down.\n";
		// return false;
	// }

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('species_number', array(
			'id' => 'pk',
			'speciesId' => 'integer NOT NULL',
			'number' => 'string NOT NULL',
			'created' => 'datetime',
			'updated' => 'datetime',));
		$this->createIndex('Species', 'species_number', 'speciesId');
		$this->dropColumn('species', 'number');
	}

	public function safeDown()
	{
		$this->addColumn('species', 'number','string');
		$this->dropTable('species_number');
	}
	
}