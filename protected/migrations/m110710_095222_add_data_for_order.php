<?php

class m110710_095222_add_data_for_order extends CDbMigration
{
	public function up()
	{
		$this->insert('order_item', array('id'=>1, 'orderId'=>1, 'bookId'=>1, 'created'=>'09-09-09', 'updated'=>'09-09-09'));
		$this->insert('order_item', array('id'=>2, 'orderId'=>1, 'bookId'=>2, 'created'=>'09-09-09', 'updated'=>'09-09-09'));

	}

	public function down()
	{
		
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