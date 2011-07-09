<?php

class m110707_125524_simplify_user extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
		// echo "m110707_125524_setup_user_module does not support migration down.\n";
		// return false;
	// }

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		// $this->createTable('profile', array(
			// 'id'=>'pk',
			// 'userId'=>'integer NOT NULL',
			// 'seed'=>'integer NOT NULL DEFAULT \'0\' ',
			// 'flower'=>'integer NOT NULL DEFAULT \'0\' ',
			// 'enrollment'=>'integer',
			// 'created'=>'datetime',
			// 'updated'=>'datetime',
		// ));
		$this->addColumn('user', 'code', 'string');
		// $this->addColumn('user', 'lastvisit', 'datetime');
		// $this->dropColumn('user', 'seed');
		// $this->dropColumn('user', 'flower');
		// $this->dropColumn('user', 'enrollment');
		$this->dropTable('suspend');
		$this->dropTable('register');
	}

	public function safeDown()
	{
		// $this->dropTable('profile');
		$this->dropColumn('user', 'code');
		// $this->dropColumn('user', 'lastvisit');
		$this->addColumn('user', 'seed', 'integer DEFAULT \'0\'');
		$this->addColumn('user', 'flower', 'integer DEFAULT \'0\'');
		$this->addColumn('user', 'enrollment', 'integer');
		$this->createTable('suspend', array(
			'id'=>'pk',
			'userId'=>'integer',
			'administratorid'=>'integer',
			'expiration'=>'datetime',
			'description'=>'text',
			'create'=>'datetime',
			'updated'=>'datetime',
		));
		$this->createTable('register', array(
			'id'=>'pk',
			'userId'=>'integer',
			'expiration'=>'datetime',
			'code'=>'string',
			'create'=>'datetime',
			'updated'=>'datetime',
		));
	}
	
}
