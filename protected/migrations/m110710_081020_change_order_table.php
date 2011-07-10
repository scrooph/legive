<?php

class m110710_081020_change_order_table extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('order','call','datetime NULL');
		$this->alterColumn('order','administratorId','integer NULL');
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
