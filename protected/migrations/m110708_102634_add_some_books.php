<?php

class m110708_102634_add_some_books extends CDbMigration
{
	public function up()
	{
		$this->insert('book', array(
			'id'=>'1',
			'speciesId'=>1,
			'status'=>'inventory',
			'number'=>'blg0110',
			'created'=>date('Y-m-d H:i:s'),
			'updated'=>date('Y-m-d H:i:s'),
		));
		$this->insert('book', array(
			'id'=>'2',
			'speciesId'=>1,
			'status'=>'inventory',
			'number'=>'blg0110',
			'created'=>date('Y-m-d H:i:s'),
			'updated'=>date('Y-m-d H:i:s'),
		));
		$this->insert('book', array(
			'id'=>'3',
			'speciesId'=>1,
			'status'=>'inventory',
			'number'=>'ld5555',
			'created'=>date('Y-m-d H:i:s'),
			'updated'=>date('Y-m-d H:i:s'),
		));
		$this->insert('book', array(
			'id'=>'4',
			'speciesId'=>2,
			'status'=>'inventory',
			'number'=>'blg7878',
			'created'=>date('Y-m-d H:i:s'),
			'updated'=>date('Y-m-d H:i:s'),
		));
	}

	public function down()
	{
		for($id=1; $id<=4; $id++){
			$this->delete('book','id=:id', array(':id'=>$id));
		}
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
