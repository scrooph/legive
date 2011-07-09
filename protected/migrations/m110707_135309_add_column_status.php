<?php

class m110707_135309_add_column_status extends CDbMigration
{
	public function up()
	{
		$this->addColumn('user', 'status', 'string');
	}

	public function down()
	{
		$this->dropColumn('user', 'status');
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