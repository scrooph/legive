<?php

class m110708_100746_add_some_data extends CDbMigration
{
	public function up()
	{
		$this->insert('species', array(
			'id'=>1,
			'name'=>'沉思录',
			'author'=>'马尔库斯·奥列里乌斯',
			'seed'=>0,
			'created'=>date('Y-m-d H:i:s'),
			'updated'=>date('Y-m-d H:i:s'),
		));
		$this->insert('species', array(
			'id'=>2,
			'name'=>'苍井空和流川枫',
			'author'=>'authors',
			'seed'=>1,
			'created'=>date('Y-m-d H:i:s'),
			'updated'=>date('Y-m-d H:i:s'),
		));
	}

	public function down()
	{
		$this->delete('species', 'id = :id', array(
			':id'=>1,
		));
		$this->delete('species', 'id = :id', array(
			':id'=>2,
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
